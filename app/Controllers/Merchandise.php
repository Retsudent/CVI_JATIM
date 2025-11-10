<?php

namespace App\Controllers;

use App\Models\MerchandiseModel;

class Merchandise extends BaseController
{
    protected $merchandiseModel;

    public function __construct()
    {
        $this->merchandiseModel = new MerchandiseModel();
    }

    public function index()
    {
        $products = $this->merchandiseModel->getAllMerchandise();
        // Load products for listing (no debug logging in normal flow)

        // Best-effort: attach aggregated rating and approved review counts per product
        try {
            $db = \Config\Database::connect();
            $aggSql = 'SELECT COALESCE(AVG(rating),0) AS avg_rating, COUNT(*) AS total_reviews FROM merchandise_reviews WHERE merchandise_id = ? AND is_approved = true';
            foreach ($products as &$p) {
                $query = $db->query($aggSql, [$p['id']]);
                $agg = $query->getRowArray();
                $p['rating'] = $agg && isset($agg['avg_rating']) ? round((float)$agg['avg_rating'], 1) : 0;
                $p['reviews'] = $agg && isset($agg['total_reviews']) ? (int)$agg['total_reviews'] : 0;
            }
            unset($p);
        } catch (\Throwable $e) {
            // If aggregation fails, ensure keys exist to avoid notices in view
            foreach ($products as &$p) { $p['rating'] = $p['rating'] ?? 0; $p['reviews'] = $p['reviews'] ?? 0; } unset($p);
        }

        $data = [
            'title' => 'Merchandise - CVI WIROTAMAN',
            'products' => $products
        ];

    return render('merchandise/index', $data);
    }

    public function detail($id)
    {
        $merchandise = $this->merchandiseModel->find($id);
        
        if (!$merchandise) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Merchandise not found');
        }

    // The detail view was originally written to render either a static
        // example product (with keys like 'title', 'sizes', 'colors', etc.)
        // or a DB-backed row. Normalize the DB row to the shape the view
        // expects so we don't hit undefined array keys in the template.

        $product = [
            'id' => $merchandise['id'],
            'title' => $merchandise['name'] ?? ($merchandise['title'] ?? 'Produk'),
            // format price as the view expects (e.g. "Rp 100.000")
            'price' => isset($merchandise['price']) ? ('Rp ' . number_format((float)$merchandise['price'], 0, ',', '.')) : 'Rp 0',
            'category' => $merchandise['category'] ?? '',
            'status' => $merchandise['status'] ?? 'available',
            'rating' => isset($merchandise['rating']) ? (float)$merchandise['rating'] : 0,
            'reviews' => isset($merchandise['reviews']) ? (int)$merchandise['reviews'] : 0,
            'image' => $merchandise['image'] ?? '',
            'description' => $merchandise['description'] ?? '',
            // parse specifications text (Key: Value per line) into associative array
            'specifications' => [],
            // sensible defaults so the template can render selection UI
            'sizes' => [],
            'colors' => [],
            'icon' => $merchandise['icon'] ?? 'fas fa-gift',
            'whatsapp_contact' => $merchandise['whatsapp_contact'] ?? '',
            'stock' => isset($merchandise['stock']) ? (int)$merchandise['stock'] : 0,
        ];

        // Compute aggregated rating and total approved reviews from merchandise_reviews
        try {
            $db = \Config\Database::connect();
            $aggSql = 'SELECT COALESCE(AVG(rating),0) AS avg_rating, COUNT(*) AS total_reviews FROM merchandise_reviews WHERE merchandise_id = ? AND is_approved = true';
            $q = $db->query($aggSql, [$id]);
            $agg = $q->getRowArray();
            $product['rating'] = $agg && isset($agg['avg_rating']) ? round((float)$agg['avg_rating'], 1) : 0;
            $product['reviews'] = $agg && isset($agg['total_reviews']) ? (int)$agg['total_reviews'] : 0;
        } catch (\Throwable $e) {
            // best-effort: fall back to value stored on merchandise row
            $product['rating'] = isset($product['rating']) ? $product['rating'] : (isset($merchandise['rating']) ? (float)$merchandise['rating'] : 0);
            $product['reviews'] = isset($product['reviews']) ? $product['reviews'] : (isset($merchandise['reviews']) ? (int)$merchandise['reviews'] : 0);
        }

        $data = [
            'title' => ($product['title'] ?? 'Merchandise') . ' - CVI WIROTAMAN',
            'merchandise' => $merchandise,
            'product' => $product,
            'product_id' => 'db',
        ];

            // Post-process DB fields: sizes/colors may be stored as comma-separated
            // strings; specifications stored as multiline text "Key: Value".
            // Normalize them into arrays for the view.
            // sizes
            if (!empty($merchandise['sizes']) && !is_array($merchandise['sizes'])) {
                $product['sizes'] = array_map('trim', array_filter(array_map('trim', explode(',', $merchandise['sizes']))));
            }
            // colors
            if (!empty($merchandise['colors']) && !is_array($merchandise['colors'])) {
                $product['colors'] = array_map('trim', array_filter(array_map('trim', explode(',', $merchandise['colors']))));
            }
            // specifications: parse lines like "Key: Value"
            if (!empty($merchandise['specifications']) && !is_array($merchandise['specifications'])) {
                $specLines = preg_split('/\r?\n/', trim((string)$merchandise['specifications']));
                $specAssoc = [];
                foreach ($specLines as $line) {
                    $parts = explode(':', $line, 2);
                    if (count($parts) === 2) {
                        $key = trim($parts[0]);
                        $val = trim($parts[1]);
                        if ($key !== '') $specAssoc[$key] = $val;
                    }
                }
                if (!empty($specAssoc)) {
                    $product['specifications'] = $specAssoc;
                } else {
                    // keep as raw text fallback
                    $product['specifications_raw'] = $merchandise['specifications'];
                }
            }

            // Ensure defaults
            if (empty($product['sizes'])) $product['sizes'] = ['S','M','L'];
            if (empty($product['colors'])) $product['colors'] = ['Default'];

            // Update data['product'] with normalized product
            $data['product'] = $product;

    return render('merchandise/detail', $data);
    }

    /**
     * Public review form and submission for a merchandise item.
     * GET: show form; POST: accept review submission and insert into merchandise_reviews.
     */
    public function review($id)
    {
        $merchandise = $this->merchandiseModel->find($id);
        if (!$merchandise) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Merchandise not found');
        }

        // Early debug: always log method, headers and raw body so we can trace incoming requests
        try {
            $rawBody = $this->request->getBody();
            $headers = function_exists('getallheaders') ? getallheaders() : [];
            log_message('info', '[Merchandise::review] Entry for id=' . $id . ' method=' . $this->request->getMethod() . ' content-type=' . ($headers['Content-Type'] ?? $this->request->getHeaderLine('Content-Type')) . ' raw=' . (is_string($rawBody) ? substr($rawBody,0,200) : '(binary)'));
        } catch (\Exception $e) {
            log_message('error', '[Merchandise::review] Early debug failure: ' . $e->getMessage());
        }

        // Build minimal product data for the review view
        $product = [
            'id' => $merchandise['id'],
            'name' => $merchandise['name'] ?? ($merchandise['title'] ?? 'Produk'),
            'category' => $merchandise['category'] ?? '',
            'price' => isset($merchandise['price']) ? (float)$merchandise['price'] : 0,
            'image' => $merchandise['image'] ?? ''
        ];

    // POST: accept submission (case-insensitive method check)
    if (strtolower($this->request->getMethod()) === 'post') {
            $post = $this->request->getPost();
            // Log that we received a POST for debugging
            log_message('info', '[Merchandise::review] Received POST for merchandise_id=' . $id . ', POST keys: ' . implode(',', array_keys((array)$post)));
            // Basic validation
            $rating = isset($post['rating']) ? (int)$post['rating'] : null;
            $name = isset($post['customer_name']) ? trim($post['customer_name']) : '';
            $email = isset($post['customer_email']) ? trim($post['customer_email']) : '';
            $comment = isset($post['comment']) ? trim($post['comment']) : '';

            if (!$rating || $rating < 1 || $rating > 5 || $name === '' || $email === '' || $comment === '') {
                return $this->response->setStatusCode(422)->setJSON(['error' => 'Validation failed: Semua field wajib diisi']);
            }

            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $this->response->setStatusCode(422)->setJSON(['error' => 'Validation failed: Format email tidak valid']);
            }

            try {
                $db = \Config\Database::connect();
                $builder = $db->table('merchandise_reviews');
                $insert = [
                    'merchandise_id' => $id,
                    'customer_name' => $name,
                    'customer_email' => $email,
                    'rating' => $rating,
                    'comment' => $comment,
                    'admin_response' => null,
                    'is_approved' => false,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $builder->insert($insert);
                $insertId = $db->insertID();
                log_message('info', '[Merchandise::review] Inserted review id=' . $insertId . ' for merchandise_id=' . $id);
                return $this->response->setStatusCode(201)->setJSON(['success' => true, 'id' => $insertId]);
            } catch (\Exception $e) {
                log_message('error', '[Merchandise::review] Insert failed: ' . $e->getMessage());
                return $this->response->setStatusCode(500)->setJSON(['error' => 'Server error']);
            }
        }

        // GET: render form
        return render('merchandise/review', ['title' => ($product['name'] ?? 'Ulasan') . ' - CVI WIROTAMAN', 'product' => $product]);
    }
}



