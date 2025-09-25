<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class AdminCrud extends BaseController
{
    public function indexPhoto(): ResponseInterface
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return $this->response->redirect('http://localhost:8080/login');
        }

        $photosModel = new \App\Models\PhotoModel();
        $photoRows = $photosModel->orderBy('created_at', 'DESC')->findAll();

        $dbName = '';
        $rawCount = null;
        $dbError = '';
        try {
            $db = \Config\Database::connect('default');
            $dbName = method_exists($db, 'getDatabase') ? (string) $db->getDatabase() : '';
            if (empty($photoRows)) {
                $builder = $db->table('photos');
                $photoRows = $builder->orderBy('created_at', 'DESC')->get()->getResultArray();
            }
            $rawCount = (int) ($db->query('SELECT COUNT(*) AS c FROM photos')->getRow('c') ?? 0);
        } catch (\Throwable $t) {
            $dbError = $t->getMessage();
        }
        // Filesystem merge: always include files from public/assets/images when missing in DB
        $imagesDir = rtrim(str_replace('\\', '/', FCPATH), '/') . '/assets/images/';
        $patterns = ['*.jpg','*.jpeg','*.png','*.webp'];
        $files = [];
        foreach ($patterns as $p) {
            $files = array_merge($files, glob($imagesDir . $p));
        }
        $filesFound = count($files);
        // Index DB rows by normalized image name (without path)
        $existing = [];
        foreach ($photoRows as $row) {
            $key = strtolower(basename((string)($row['image'] ?? '')));
            if ($key !== '') { $existing[$key] = true; }
        }
        foreach ($files as $f) {
            $name = basename($f);
            if ($name === 'placeholder.jpg' || $name === 'placeholder.svg') { continue; }
            $key = strtolower($name);
            if (!isset($existing[$key])) {
                $photoRows[] = [
                    'id' => 0,
                    'title' => pathinfo($name, PATHINFO_FILENAME),
                    'caption' => '',
                    'image' => $name,
                    'created_at' => date('Y-m-d H:i:s', @filemtime($f) ?: time()),
                ];
            }
        }

        $data = [
            'photos' => $photoRows,
            'success' => $session->getFlashdata('success'),
            'error' => $session->getFlashdata('error'),
            'debug' => [
                'dbName' => $dbName,
                'rawCount' => $rawCount,
                'dbError' => $dbError,
                'filesFound' => $filesFound,
            ],
        ];

        return $this->response->setBody(view('admin/gallery/index', $data));
    }

    public function createEvent(): ResponseInterface
    {
        return $this->response->setBody(view('admin/events/create'));
    }

    public function storeEvent(): ResponseInterface
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return $this->response->redirect('http://localhost:8080/login');
        }

        // Handle image upload or URL
        $imagePath = (string) ($this->request->getPost('image') ?: '');
        try {
            $file = $this->request->getFile('image_file');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $targetDir = ROOTPATH . 'public' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images';
                if (!is_dir($targetDir)) { @mkdir($targetDir, 0775, true); }
                $randomName = $file->getRandomName();
                $file->move($targetDir, $randomName);
                $imagePath = 'assets/images/' . $randomName;
            }
        } catch (\Throwable $e) {
            // keep fallback
        }

        $data = [
            'title'       => (string) $this->request->getPost('title'),
            'description' => (string) $this->request->getPost('description'),
            'location'    => (string) $this->request->getPost('location'),
            'start_date'  => (string) $this->request->getPost('start_date'),
            'end_date'    => (string) $this->request->getPost('end_date'),
            'price'       => $this->request->getPost('price') !== null ? (string) $this->request->getPost('price') : null,
            'status'      => (string) ($this->request->getPost('status') ?: 'upcoming'),
            'image'       => $imagePath,
        ];

        $events = new \App\Models\EventModel();
        $events->insert($data);

        return $this->response->redirect('http://localhost:8080/admin/events');
    }

    public function createMerch(): ResponseInterface
    {
        return $this->response->setBody(view('admin/merchandise/create'));
    }

    public function storeMerch(): ResponseInterface
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return $this->response->redirect('http://localhost:8080/login');
        }

        // Handle image upload or URL
        $imagePath = (string) ($this->request->getPost('image') ?: '');
        try {
            $file = $this->request->getFile('image_file');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $targetDir = ROOTPATH . 'public' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images';
                if (!is_dir($targetDir)) { @mkdir($targetDir, 0775, true); }
                $randomName = $file->getRandomName();
                $file->move($targetDir, $randomName);
                $imagePath = 'assets/images/' . $randomName;
            }
        } catch (\Throwable $e) {
            // keep fallback
        }

        $data = [
            'name'        => (string) $this->request->getPost('name'),
            'description' => (string) $this->request->getPost('description'),
            'price'       => (string) $this->request->getPost('price'),
            'category'    => (string) $this->request->getPost('category'),
            'stock'       => (int) ($this->request->getPost('stock') ?: 0),
            'status'      => (string) ($this->request->getPost('status') ?: 'available'),
            'image'       => $imagePath,
        ];

        $merch = new \App\Models\MerchandiseModel();
        $merch->insert($data);

        return $this->response->redirect('http://localhost:8080/admin/merchandise');
    }

    public function createCamp(): ResponseInterface
    {
        return $this->response->setBody(view('admin/campground/create'));
    }

    public function storeCamp(): ResponseInterface
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return $this->response->redirect('http://localhost:8080/login');
        }

        // Image handling: prefer uploaded file, fallback to URL/text field
        $imagePath = (string) ($this->request->getPost('image') ?: '');
        try {
            $file = $this->request->getFile('image_file');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $targetDir = ROOTPATH . 'public' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images';
                if (!is_dir($targetDir)) { @mkdir($targetDir, 0775, true); }
                $randomName = $file->getRandomName();
                $file->move($targetDir, $randomName);
                $imagePath = 'assets/images/' . $randomName;
            }
        } catch (\Throwable $e) {
            // keep fallback imagePath
        }

        $data = [
            'name'             => (string) $this->request->getPost('name'),
            'description'      => (string) $this->request->getPost('description'),
            'location'         => (string) $this->request->getPost('location'),
            'price_per_person' => (string) $this->request->getPost('price_per_person'),
            'facilities'       => (string) ($this->request->getPost('facilities') ?: ''),
            'contact_info'     => (string) ($this->request->getPost('contact_info') ?: ''),
            'status'           => (string) ($this->request->getPost('status') ?: 'active'),
            'image'            => $imagePath,
        ];

        $camp = new \App\Models\CampgroundModel();
        $camp->insert($data);

        return $this->response->redirect('http://localhost:8080/admin/campground');
    }

    public function createPhoto(): ResponseInterface
    {
        $session = session();
        $data = [
            'success' => $session->getFlashdata('success'),
            'error' => $session->getFlashdata('error'),
        ];
        return $this->response->setBody(view('admin/gallery/create', $data));
    }

    public function storePhoto(): ResponseInterface
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return $this->response->redirect('http://localhost:8080/login');
        }

        // Handle file upload (simple, no overwrite handling)
        $file = $this->request->getFile('image_file');
        $storedName = '';

        $targetDir = ROOTPATH . 'public' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images';
        if (!is_dir($targetDir)) {
            @mkdir($targetDir, 0775, true);
        }

        if (!$file || !$file->isValid()) {
            $session->setFlashdata('error', 'File tidak valid. Pastikan Anda memilih gambar.');
            return $this->response->redirect('http://localhost:8080/admin/gallery/create');
        }

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $storedName = $file->getRandomName();
            try {
                $file->move($targetDir, $storedName);
            } catch (\Throwable $e) {
                $session->setFlashdata('error', 'Gagal menyimpan file: ' . $e->getMessage());
                return $this->response->redirect('http://localhost:8080/admin/gallery/create');
            }
        }

        if ($storedName === '') {
            $session->setFlashdata('error', 'Upload gagal: file belum tersimpan. Coba pilih ulang gambarnya.');
            return $this->response->redirect('http://localhost:8080/admin/gallery/create');
        }

        $data = [
            'title'   => (string) ($this->request->getPost('title') ?: ''),
            'caption' => (string) ($this->request->getPost('caption') ?: ''),
            'image'   => $storedName,
        ];

        $photos = new \App\Models\PhotoModel();
        $insertId = $photos->insert($data);
        if ($insertId === false) {
            $errors = $photos->errors();
            $session->setFlashdata('error', 'Gagal menyimpan ke database.' . (!empty($errors) ? ' ' . implode(', ', $errors) : ''));
            return $this->response->redirect('http://localhost:8080/admin/gallery/create');
        }

        $session->setFlashdata('success', 'Foto berhasil diunggah.');

        return $this->response->redirect('http://localhost:8080/admin/gallery');
    }
}




