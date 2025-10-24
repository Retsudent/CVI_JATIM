<?php

namespace App\Controllers;

use App\Models\CampgroundModel;

class Campground extends BaseController
{
    protected $campgroundModel;

    public function __construct()
    {
        $this->campgroundModel = new CampgroundModel();
    }

    public function index()
    {
        // Load campgrounds from database via model
        $campModel = new CampgroundModel();
        $campgrounds = $campModel->getAllCampgrounds();

        // Attach rating and reviews counts if table exists (best-effort)
        try {
            $db = \Config\Database::connect();
            $aggSql = 'SELECT COALESCE(AVG(rating),0) AS avg_rating, COUNT(*) AS total_reviews FROM campground_reviews WHERE campground_id = ? AND is_approved = true';
            foreach ($campgrounds as &$cg) {
                $query = $db->query($aggSql, [$cg['id']]);
                $row = $query->getRowArray();
                $cg['rating'] = $row ? (isset($row['avg_rating']) ? round((float)$row['avg_rating'], 1) : null) : null;
                $cg['reviews'] = $row ? (isset($row['total_reviews']) ? (int)$row['total_reviews'] : 0) : 0;
            }
            unset($cg);
        } catch (\Throwable $e) {
            foreach ($campgrounds as &$cg) { $cg['rating'] = null; $cg['reviews'] = 0; } unset($cg);
        }

        $data = [
            'title' => 'Campground - CVI WIROTAMAN',
            'campgrounds' => $campgrounds
        ];

        return render('campground/index', $data);
    }

    public function detail($id)
    {
        // Load from DB
        $campModel = new CampgroundModel();
        $campground = $campModel->find($id);
        if (!$campground) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Campground not found');
        }

        // Related: other campgrounds
        $related = $campModel->where('id !=', $id)->orderBy('created_at', 'DESC')->findAll(3);

        // Compute aggregated rating and total approved reviews for this campground
        try {
            $db = \Config\Database::connect();
            $aggSql = 'SELECT COALESCE(AVG(rating),0) AS avg_rating, COUNT(*) AS total_reviews FROM campground_reviews WHERE campground_id = ? AND is_approved = true';
            $q = $db->query($aggSql, [$id]);
            $agg = $q->getRowArray();
            $campground['rating'] = $agg && isset($agg['avg_rating']) ? round((float)$agg['avg_rating'], 1) : 0;
            $campground['reviews'] = $agg && isset($agg['total_reviews']) ? (int)$agg['total_reviews'] : 0;
        } catch (\Throwable $e) {
            $campground['rating'] = $campground['rating'] ?? 0;
            $campground['reviews'] = $campground['reviews'] ?? 0;
        }

        $data = [
            'title' => ($campground['name'] ?? 'Campground') . ' - CVI WIROTAMAN',
            'campground' => $campground,
            'related_campgrounds' => $related
        ];

        return render('campground/detail', $data);
    }

    /**
     * Public review form and submission for a campground.
     * GET: show form; POST: accept review submission and insert into campground_reviews.
     */
    public function review($id)
    {
        $campground = $this->campgroundModel->find($id);
        if (!$campground) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Campground not found');
        }

        // Early debug: log method, headers and raw body similar to Merchandise::review
        try {
            $rawBody = $this->request->getBody();
            $headers = function_exists('getallheaders') ? getallheaders() : [];
            log_message('info', '[Campground::review] Entry for id=' . $id . ' method=' . $this->request->getMethod() . ' content-type=' . ($headers['Content-Type'] ?? $this->request->getHeaderLine('Content-Type')) . ' raw=' . (is_string($rawBody) ? substr($rawBody,0,200) : '(binary)'));
        } catch (\Exception $e) {
            log_message('error', '[Campground::review] Early debug failure: ' . $e->getMessage());
        }

        // Build minimal product data for the review view
        $product = [
            'id' => $campground['id'],
            'name' => $campground['name'] ?? 'Campground',
            'category' => $campground['location'] ?? '',
        ];

        // POST: accept submission
        if (strtolower($this->request->getMethod()) === 'post') {
            $post = $this->request->getPost();
            log_message('info', '[Campground::review] Received POST for campground_id=' . $id . ', POST keys: ' . implode(',', array_keys((array)$post)));

            $rating = isset($post['rating']) ? (int)$post['rating'] : null;
            $name = isset($post['customer_name']) ? trim($post['customer_name']) : '';
            $comment = isset($post['comment']) ? trim($post['comment']) : '';

            if (!$rating || $rating < 1 || $rating > 5 || $name === '' || $comment === '') {
                return $this->response->setStatusCode(422)->setJSON(['error' => 'Validation failed']);
            }

            try {
                $db = \Config\Database::connect();
                $builder = $db->table('campground_reviews');
                $insert = [
                    'campground_id' => $id,
                    'customer_name' => $name,
                    'customer_email' => $post['customer_email'] ?? null,
                    'rating' => $rating,
                    'comment' => $comment,
                    'admin_response' => null,
                    'is_approved' => false,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $builder->insert($insert);
                $insertId = $db->insertID();
                log_message('info', '[Campground::review] Inserted review id=' . $insertId . ' for campground_id=' . $id);
                return $this->response->setStatusCode(201)->setJSON(['success' => true, 'id' => $insertId]);
            } catch (\Exception $e) {
                log_message('error', '[Campground::review] Insert failed: ' . $e->getMessage());
                return $this->response->setStatusCode(500)->setJSON(['error' => 'Server error']);
            }
        }

        // GET: render form (pass the DB campground row so view has expected variables)
        return render('campground/review', ['title' => ($campground['name'] ?? 'Ulasan') . ' - CVI WIROTAMAN', 'campground' => $campground]);
    }
}



