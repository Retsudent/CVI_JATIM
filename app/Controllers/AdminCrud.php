<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EventModel;
use App\Models\MerchandiseModel;
use App\Models\CampgroundModel;
use App\Models\PhotoModel;

class AdminCrud extends BaseController
{
    protected $session;
    protected $db;

    public function __construct()
    {
        $this->session = session();
        $this->db = db_connect();
    }

    // Event Methods
    public function indexEvents(): ResponseInterface
    {
        $eventsModel = new EventModel();
        $rows = $eventsModel->orderBy('start_date', 'DESC')->findAll();
        return $this->response->setBody(view('admin/events/index', [
            'events' => $rows,
            'session' => $this->session
        ]));
    }

    public function createEvent(): ResponseInterface
    {
        return $this->response->setBody(view('admin/events/create'));
    }

    // Wrapper to match routes which expect storeEvent
    public function storeEvent(): ResponseInterface
    {
        // delegate to saveEvent for backward-compatibility
        return $this->saveEvent();
    }

    public function saveEvent(): ResponseInterface 
    {
        $session = session();
        
        try {
            log_message('debug', '[saveEvent] Starting event save process');
            log_message('debug', '[saveEvent] POST data: ' . json_encode($this->request->getPost()));

            // 1. Test database connection
            try {
                $db = \Config\Database::connect();
                $testResult = $db->query('SELECT NOW()')->getResult();
                log_message('debug', '[saveEvent] Database connection test: ' . ($testResult ? 'Success' : 'Failed'));
            } catch (\Exception $e) {
                log_message('error', '[saveEvent] Database connection failed: ' . $e->getMessage());
                throw new \Exception('Database connection failed: ' . $e->getMessage());
            }

            // 2. Validate input
            $rules = [
                'title' => 'required|min_length[3]|max_length[255]',
                'description' => 'required|min_length[10]',
                'location' => 'required|min_length[5]',
                'start_date' => 'required|valid_date',
                // optional fields
                'capacity' => 'permit_empty|integer',
                'whatsapp_contact' => 'permit_empty',
                'activities' => 'permit_empty',
                'facilities' => 'permit_empty'
            ];

            if (!$this->validate($rules)) {
                $validationErrors = $this->validator->getErrors();
                log_message('warning', '[saveEvent] Validation failed: ' . json_encode($validationErrors));
                // Provide both an array (for listing) and a string (for single-line alerts)
                $session->setFlashdata('errors', $validationErrors);
                $session->setFlashdata('error', implode('<br>', $validationErrors));
                return redirect()->back()->withInput();
            }
            log_message('debug', '[saveEvent] Validation passed');

            // 3. Prepare data
            $data = [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'location' => $this->request->getPost('location'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date') ?: null,
                'price' => floatval($this->request->getPost('price')) ?: null,
                'capacity' => $this->request->getPost('capacity') !== null && $this->request->getPost('capacity') !== '' ? (int)$this->request->getPost('capacity') : null,
                'whatsapp_contact' => $this->request->getPost('whatsapp_contact') ?: null,
                'activities' => $this->request->getPost('activities') ?: null,
                'facilities' => $this->request->getPost('facilities') ?: null,
                'status' => 'upcoming',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            log_message('debug', '[saveEvent] Prepared data: ' . json_encode($data));

            // 3.a Handle uploaded image (if provided)
            try {
                $imageFile = $this->request->getFile('image_file');
                if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                    $uploadDir = FCPATH . 'assets/images/events/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0755, true);
                    }
                    $newName = $imageFile->getRandomName();
                    $imageFile->move($uploadDir, $newName);
                    // store public URL so views can use it directly
                    $data['image'] = base_url('assets/images/events/' . $newName);
                    log_message('debug', '[saveEvent] Uploaded image saved: ' . $data['image']);
                } else {
                    // Backwards compat: allow manual image text input (if any)
                    $textImage = $this->request->getPost('image');
                    if (!empty($textImage)) {
                        $data['image'] = $textImage;
                    }
                }
            } catch (\Throwable $e) {
                log_message('warning', '[saveEvent] Image upload error: ' . $e->getMessage());
            }

            // 4. Save to database using transaction
            $db->transStart();
            
            $builder = $db->table('events');
            $result = $builder->insert($data);
            
            if (!$result) {
                log_message('error', '[saveEvent] Insert failed with builder');
                throw new \Exception('Failed to insert event using query builder');
            }

            $insertId = $db->insertID();
            log_message('debug', '[saveEvent] Insert ID: ' . $insertId);

            // Verify the insert
            $inserted = $builder->where('id', $insertId)->get()->getRowArray();
            if (!$inserted) {
                log_message('error', '[saveEvent] Could not verify inserted record');
                throw new \Exception('Could not verify inserted record');
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                log_message('error', '[saveEvent] Transaction failed');
                throw new \Exception('Database transaction failed');
            }

            log_message('info', '[saveEvent] Successfully saved event with ID: ' . $insertId);
            $session->setFlashdata('success', 'Event berhasil ditambahkan');
            return redirect()->to(base_url('admin/events'));
            
        } catch (\Exception $e) {
            log_message('error', '[saveEvent] Error: ' . $e->getMessage());
            log_message('error', '[saveEvent] Stack trace: ' . $e->getTraceAsString());
            $session->setFlashdata('error', 'Gagal menyimpan event: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function editEvent($id): ResponseInterface
    {
        $model = new EventModel();
        $row = $model->find($id);
        if (!$row) {
            return $this->response->setStatusCode(404)->setBody('Event not found');
        }
        return $this->response->setBody(view('admin/events/edit', ['event' => $row]));
    }

    public function updateEvent($id): ResponseInterface
    {
        $model = new EventModel();
        $session = session();

        // Validate similar to saveEvent but allow optional fields
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[10]',
            'location' => 'required|min_length[5]',
            'start_date' => 'required|valid_date',
            'capacity' => 'permit_empty|integer',
            'whatsapp_contact' => 'permit_empty',
            'activities' => 'permit_empty',
            'facilities' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            $validationErrors = $this->validator->getErrors();
            log_message('warning', '[updateEvent] Validation failed: ' . json_encode($validationErrors));
            $session->setFlashdata('errors', $validationErrors);
            $session->setFlashdata('error', implode('<br>', $validationErrors));
            return redirect()->back()->withInput();
        }

        // Normalize and prepare data for update
        $post = $this->request->getPost();
        $data = [
            'title' => $post['title'] ?? null,
            'description' => $post['description'] ?? null,
            'location' => $post['location'] ?? null,
            'start_date' => $post['start_date'] ?? null,
            'end_date' => $post['end_date'] ?: null,
            'price' => isset($post['price']) && $post['price'] !== '' ? floatval($post['price']) : null,
            'capacity' => isset($post['capacity']) && $post['capacity'] !== '' ? (int)$post['capacity'] : null,
            'whatsapp_contact' => $post['whatsapp_contact'] ?: null,
            'activities' => $post['activities'] ?: null,
            'facilities' => $post['facilities'] ?: null,
            'status' => $post['status'] ?? 'upcoming',
            // image may be provided via upload; we'll set below if present
            'image' => $post['image'] ?? null,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Handle uploaded image during update (optional)
        try {
            $imageFile = $this->request->getFile('image_file');
            if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                $uploadDir = FCPATH . 'assets/images/events/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $newName = $imageFile->getRandomName();
                $imageFile->move($uploadDir, $newName);
                $data['image'] = base_url('assets/images/events/' . $newName);
                log_message('debug', '[updateEvent] Uploaded image saved: ' . $data['image']);
            }
        } catch (\Throwable $e) {
            log_message('warning', '[updateEvent] Image upload error: ' . $e->getMessage());
        }

        try {
            $result = $model->update($id, $data);
            if ($result === false) {
                $errors = $model->errors();
                log_message('error', '[updateEvent] Model update failed: ' . json_encode($errors));
                $session->setFlashdata('error', 'Gagal memperbarui event: ' . implode('; ', $errors ?: ['unknown error']));
                return redirect()->back()->withInput();
            }

            $session->setFlashdata('success', 'Event updated');
        } catch (\Exception $e) {
            log_message('error', '[updateEvent] Exception: ' . $e->getMessage());
            $session->setFlashdata('error', 'Failed to update event: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to(base_url('admin/events'));
    }

    public function deleteEvent($id): ResponseInterface
    {
        $model = new EventModel();
        try {
            $model->delete($id);
            $this->session->setFlashdata('success', 'Event deleted');
        } catch (\Exception $e) {
            $this->session->setFlashdata('error', 'Failed to delete event');
        }
        return redirect()->to(base_url('admin/events'));
    }

    // Merchandise Methods
    public function indexMerch(): ResponseInterface
    {
        $merchModel = new MerchandiseModel();
        $rows = $merchModel->orderBy('created_at', 'DESC')->findAll();
        return $this->response->setBody(view('admin/merchandise/index', [
            'products' => $rows,
            'session' => $this->session
        ]));
    }

    public function createMerch(): ResponseInterface
    {
        return $this->response->setBody(view('admin/merchandise/create'));
    }

    public function storeMerch(): ResponseInterface
    {
        $session = session();
        
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[10]',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            $errs = $this->validator->getErrors();
            log_message('warning', '[storeMerch] Validation failed: ' . json_encode($errs));
            return redirect()->back()
                           ->withInput()
                           ->with('errors', $errs);
        }

        try {
            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'category' => $this->request->getPost('category'),
                'stock' => (int)$this->request->getPost('stock'),
                'status' => $this->request->getPost('status') ?: 'available',
                // image filled below (upload or manual)
                'image' => null,
                'sizes' => $this->normalizeMultiline($this->request->getPost('sizes')),
                'colors' => $this->normalizeMultiline($this->request->getPost('colors')),
                'specifications' => $this->normalizeSpecText($this->request->getPost('specifications')),
                'whatsapp_contact' => $this->request->getPost('whatsapp_contact') ?: null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Handle uploaded image (optional). Keep backwards compat with text input 'image'.
            try {
                $imageFile = $this->request->getFile('image_file');
                if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                    $uploadDir = FCPATH . 'assets/images/merchandise/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0755, true);
                    }
                    $newName = $imageFile->getRandomName();
                    $imageFile->move($uploadDir, $newName);
                    $data['image'] = base_url('assets/images/merchandise/' . $newName);
                    log_message('debug', '[storeMerch] Uploaded image saved: ' . $data['image']);
                } else {
                    $textImage = $this->request->getPost('image');
                    if (!empty($textImage)) {
                        $data['image'] = $textImage;
                    }
                }
            } catch (\Throwable $e) {
                log_message('warning', '[storeMerch] Image upload error: ' . $e->getMessage());
            }

            $merchModel = new MerchandiseModel();
            if (!$merchModel->insert($data)) {
                $errors = $merchModel->errors();
                throw new \Exception('Failed to insert merchandise: ' . implode(', ', $errors));
            }

            return redirect()->to(base_url('admin/merchandise'))
                           ->with('success', 'Merchandise berhasil ditambahkan');
        } catch (\Exception $e) {
            log_message('error', '[Merchandise Create] ' . $e->getMessage());
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Gagal menyimpan merchandise. Silakan coba lagi.');
        }
    }

    public function editMerch($id): ResponseInterface
    {
        $model = new MerchandiseModel();
        $row = $model->find($id);
        if (!$row) {
            return $this->response->setStatusCode(404)->setBody('Product not found');
        }
        return $this->response->setBody(view('admin/merchandise/edit', ['product' => $row]));
    }

    public function updateMerch($id): ResponseInterface
    {
        $model = new MerchandiseModel();
        $post = $this->request->getPost();
        $data = [
            'name' => $post['name'] ?? null,
            'description' => $post['description'] ?? null,
            'price' => isset($post['price']) && $post['price'] !== '' ? $post['price'] : null,
            'category' => $post['category'] ?? null,
            'stock' => isset($post['stock']) ? (int)$post['stock'] : 0,
            'status' => $post['status'] ?? 'available',
            'image' => $post['image'] ?? null,
            'whatsapp_contact' => $post['whatsapp_contact'] ?: null,
            'sizes' => $this->normalizeMultiline($post['sizes'] ?? null),
            'colors' => $this->normalizeMultiline($post['colors'] ?? null),
            'specifications' => $this->normalizeSpecText($post['specifications'] ?? null),
            'rating' => isset($post['rating']) && $post['rating'] !== '' ? (float)$post['rating'] : null,
            'reviews' => isset($post['reviews']) && $post['reviews'] !== '' ? (int)$post['reviews'] : null,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // If an image file is uploaded, move it and override image field
        try {
            $imageFile = $this->request->getFile('image_file');
            if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                $uploadDir = FCPATH . 'assets/images/merchandise/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $newName = $imageFile->getRandomName();
                $imageFile->move($uploadDir, $newName);
                $data['image'] = base_url('assets/images/merchandise/' . $newName);
                log_message('debug', '[updateMerch] Uploaded image saved: ' . $data['image']);
            }

            $result = $model->update($id, $data);
            if ($result === false) {
                $errors = $model->errors();
                log_message('error', '[updateMerch] Model update failed: ' . json_encode($errors));
                $this->session->setFlashdata('error', 'Gagal memperbarui merchandise: ' . implode('; ', $errors ?: ['unknown error']));
                return redirect()->back()->withInput();
            }
            $this->session->setFlashdata('success', 'Merchandise updated');
        } catch (\Exception $e) {
            $this->session->setFlashdata('error', 'Failed to update merchandise');
        }
        return redirect()->to(base_url('admin/merchandise'));
    }

    public function deleteMerch($id): ResponseInterface
    {
        $model = new MerchandiseModel();
        try {
            $model->delete($id);
            $this->session->setFlashdata('success', 'Merchandise deleted');
        } catch (\Exception $e) {
            $this->session->setFlashdata('error', 'Failed to delete merchandise');
        }
        return redirect()->to(base_url('admin/merchandise'));
    }

    // Campground Methods
    public function indexCamp(): ResponseInterface
    {
        $campModel = new CampgroundModel();
        $rows = $campModel->orderBy('created_at', 'DESC')->findAll();
        return $this->response->setBody(view('admin/campground/index', [
            'locations' => $rows,
            'session' => $this->session
        ]));
    }

    public function createCamp(): ResponseInterface
    {
        return $this->response->setBody(view('admin/campground/create'));
    }

    public function storeCamp(): ResponseInterface
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'location' => $this->request->getPost('location'),
            'price_per_person' => $this->request->getPost('price_per_person'),
            'capacity_tent' => $this->request->getPost('capacity_tent') ?: null,
            'capacity_people' => $this->request->getPost('capacity_people') ?: null,
            'capacity_parking' => $this->request->getPost('capacity_parking') ?: null,
            'address' => $this->request->getPost('address') ?: '',
            'coordinates_lat' => $this->request->getPost('coordinates_lat') ?: '',
            'coordinates_lng' => $this->request->getPost('coordinates_lng') ?: '',
            'facilities' => $this->request->getPost('facilities') ?: '',
            'contact_info' => $this->request->getPost('contact_info') ?: '',
            'status' => $this->request->getPost('status') ?: 'active',
            // image set below (upload or manual)
            'image' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        try {
            // Handle uploaded image (optional)
            try {
                $imageFile = $this->request->getFile('image_file');
                if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                    $uploadDir = FCPATH . 'assets/images/campground/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0755, true);
                    }
                    $newName = $imageFile->getRandomName();
                    $imageFile->move($uploadDir, $newName);
                    $data['image'] = base_url('assets/images/campground/' . $newName);
                    log_message('debug', '[storeCamp] Uploaded image saved: ' . $data['image']);
                } else {
                    $textImage = $this->request->getPost('image');
                    if (!empty($textImage)) {
                        $data['image'] = $textImage;
                    }
                }
            } catch (\Throwable $e) {
                log_message('warning', '[storeCamp] Image upload error: ' . $e->getMessage());
            }

            $camp = new CampgroundModel();
            if (!$camp->insert($data)) {
                throw new \Exception('Failed to insert campground');
            }
            return redirect()->to(base_url('admin/campground'))
                           ->with('success', 'Campground berhasil ditambahkan');
        } catch (\Exception $e) {
            log_message('error', '[Campground Create] ' . $e->getMessage());
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Gagal menyimpan campground');
        }
    }

    public function editCamp($id): ResponseInterface
    {
        $model = new CampgroundModel();
        $row = $model->find($id);
        if (!$row) {
            return $this->response->setStatusCode(404)->setBody('Campground not found');
        }
        return $this->response->setBody(view('admin/campground/edit', ['camp' => $row]));
    }

    public function updateCamp($id): ResponseInterface
    {
        $model = new CampgroundModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'location' => $this->request->getPost('location'),
            'price_per_person' => $this->request->getPost('price_per_person'),
            'capacity_tent' => $this->request->getPost('capacity_tent') ?: null,
            'capacity_people' => $this->request->getPost('capacity_people') ?: null,
            'capacity_parking' => $this->request->getPost('capacity_parking') ?: null,
            'address' => $this->request->getPost('address') ?: '',
            'coordinates_lat' => $this->request->getPost('coordinates_lat') ?: '',
            'coordinates_lng' => $this->request->getPost('coordinates_lng') ?: '',
            'facilities' => $this->request->getPost('facilities') ?: '',
            'contact_info' => $this->request->getPost('contact_info') ?: '',
            'status' => $this->request->getPost('status') ?: 'active',
            'image' => $this->request->getPost('image') ?: null,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Handle uploaded image during update (optional)
        try {
            $imageFile = $this->request->getFile('image_file');
            if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                $uploadDir = FCPATH . 'assets/images/campground/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $newName = $imageFile->getRandomName();
                $imageFile->move($uploadDir, $newName);
                $data['image'] = base_url('assets/images/campground/' . $newName);
                log_message('debug', '[updateCamp] Uploaded image saved: ' . $data['image']);
            }
        } catch (\Throwable $e) {
            log_message('warning', '[updateCamp] Image upload error: ' . $e->getMessage());
        }

        try {
            $result = $model->update($id, $data);
            if ($result === false) {
                $errors = $model->errors();
                log_message('error', '[updateCamp] Model update failed: ' . json_encode($errors));
                $this->session->setFlashdata('error', 'Gagal memperbarui campground: ' . implode('; ', $errors ?: ['unknown error']));
                return redirect()->back()->withInput();
            }
            $this->session->setFlashdata('success', 'Campground updated');
        } catch (\Exception $e) {
            log_message('error', '[updateCamp] Exception: ' . $e->getMessage());
            $this->session->setFlashdata('error', 'Failed to update campground');
        }

        return redirect()->to(base_url('admin/campground'));
    }

    public function deleteCamp($id): ResponseInterface
    {
        $model = new CampgroundModel();
        try {
            $model->delete($id);
            $this->session->setFlashdata('success', 'Campground deleted');
        } catch (\Exception $e) {
            $this->session->setFlashdata('error', 'Failed to delete campground');
        }
        return redirect()->to(base_url('admin/campground'));
    }

    // Reviews management
    public function indexReviews(): ResponseInterface
    {
        // The view handles listing via direct DB queries for convenience
        return $this->response->setBody(view('admin/reviews/index'));
    }

    /**
     * Show/respond to a review (GET shows form, POST saves response)
     * $type: 'merchandise' or 'campground'
     */
    public function respondReview(string $type, int $id): ResponseInterface
    {
        // Entry log to help debug requests reaching this method
        try {
            log_message('info', '[respondReview] Entered method; HTTP_METHOD=' . $this->request->getMethod() . ' type=' . $type . ' id=' . $id);
            // Log POST keys if present (avoid dumping large bodies)
            if (strtolower($this->request->getMethod()) === 'post') {
                log_message('debug', '[respondReview] Incoming POST keys: ' . json_encode(array_keys($this->request->getPost())));
            }
        } catch (\Throwable $t) {
            // Ensure logging failure doesn't break flow
            // ignore
        }
        $allowed = ['merchandise' => 'merchandise_reviews', 'campground' => 'campground_reviews'];
        if (!isset($allowed[$type])) {
            return $this->response->setStatusCode(404)->setBody('Review type not supported');
        }

        $table = $allowed[$type];

        $table = $allowed[$type];

        // POST: save admin response
    if (strtolower($this->request->getMethod()) === 'post') {
            // Trim and validate input
            $adminResponse = trim((string)$this->request->getPost('admin_response'));

            log_message('info', '[respondReview] Received POST for review id=' . $id . ' type=' . $type . ' admin_response_len=' . strlen($adminResponse));
            log_message('debug', '[respondReview] POST data keys: ' . json_encode(array_keys($this->request->getPost())));

            if ($adminResponse === '') {
                $this->session->setFlashdata('error', 'Respon tidak boleh kosong');
                return redirect()->back()->withInput();
            }

            $update = [
                'admin_response' => $adminResponse,
                'is_approved' => true,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            try {
                $builder = $this->db->table($table);
                $ok = $builder->where('id', $id)->update($update);

                // Some drivers return boolean, others return number of affected rows. Normalize.
                $affected = null;
                try { $affected = $this->db->affectedRows(); } catch (\Throwable $t) { /* ignore */ }

                log_message('info', '[respondReview] Update executed for id=' . $id . ' result=' . var_export($ok, true) . ' affected=' . var_export($affected, true));

                if ($ok) {
                    $this->session->setFlashdata('success', 'Respon berhasil disimpan');
                } else {
                    $this->session->setFlashdata('error', 'Gagal menyimpan respon');
                }
            } catch (\Exception $e) {
                log_message('error', '[respondReview] Error updating review: ' . $e->getMessage());
                $this->session->setFlashdata('error', 'Terjadi kesalahan saat menyimpan respon');
            }

            // Redirect back to listing and keep the same tab active using fragment (#merchandise or #campground)
            return redirect()->to(base_url('admin/reviews') . '#' . $type);
        }

        // GET: fetch review and render respond form
        $row = $this->db->table($table)->where('id', $id)->get()->getRowArray();
        if (!$row) {
            return $this->response->setStatusCode(404)->setBody('Review not found');
        }

        return $this->response->setBody(view('admin/reviews/respond', [
            'type' => $type,
            'review' => $row
        ]));
    }

    public function deleteReview(string $type, int $id): ResponseInterface
    {
        $allowed = ['merchandise' => 'merchandise_reviews', 'campground' => 'campground_reviews'];
        if (!isset($allowed[$type])) {
            return $this->response->setStatusCode(404)->setBody('Review type not supported');
        }
        $table = $allowed[$type];
        try {
            $this->db->table($table)->where('id', $id)->delete();
            $this->session->setFlashdata('success', 'Review deleted');
        } catch (\Exception $e) {
            log_message('error', '[deleteReview] Failed to delete review: ' . $e->getMessage());
            $this->session->setFlashdata('error', 'Gagal menghapus review');
        }
        return redirect()->to(base_url('admin/reviews') . '#' . $type);
    }

    /**
     * Toggle approval state for a review (approve/hide)
     * $type: 'merchandise' or 'campground'
     */
    public function toggleReview(string $type, int $id): ResponseInterface
    {
        $allowed = ['merchandise' => 'merchandise_reviews', 'campground' => 'campground_reviews'];
        if (!isset($allowed[$type])) {
            return $this->response->setStatusCode(404)->setBody('Review type not supported');
        }

        $table = $allowed[$type];

        try {
            $builder = $this->db->table($table);
            $row = $builder->where('id', $id)->get()->getRowArray();
            if (!$row) {
                $this->session->setFlashdata('error', 'Review not found');
                return redirect()->to(base_url('admin/reviews'));
            }
            // Normalize various possible DB representations for boolean (Postgres may return 't'/'f')
            $raw = $row['is_approved'];
            if (is_bool($raw)) {
                $current = $raw;
            } elseif ($raw === 1 || $raw === '1' || $raw === 't' || $raw === 'T' || strcasecmp((string)$raw, 'true') === 0) {
                $current = true;
            } elseif ($raw === 0 || $raw === '0' || $raw === 'f' || $raw === 'F' || strcasecmp((string)$raw, 'false') === 0) {
                $current = false;
            } else {
                // Fallback to PHP boolean cast
                $current = (bool)$raw;
            }

            // Toggle
            $approved = !$current;
            log_message('info', '[toggleReview] Current raw is_approved=' . var_export($raw, true) . ' resolved=' . ($current ? 'true' : 'false') . ' -> setting to ' . ($approved ? 'true' : 'false'));
            $builder->where('id', $id)->update([
                'is_approved' => $approved,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            $this->session->setFlashdata('success', $approved ? 'Review disetujui' : 'Review disembunyikan');
            log_message('info', '[toggleReview] Review id=' . $id . ' set is_approved=' . ($approved ? 'true' : 'false'));
        } catch (\Exception $e) {
            log_message('error', '[toggleReview] Failed: ' . $e->getMessage());
            $this->session->setFlashdata('error', 'Gagal memperbarui status review');
        }

        return redirect()->to(base_url('admin/reviews') . '#' . $type);
    }

    // Photo Methods
    public function indexPhoto(): ResponseInterface
    {
        $photosModel = new PhotoModel();
        $photoRows = $photosModel->orderBy('created_at', 'DESC')->findAll();

        // Handle filesystem photos
        $imagesDir = FCPATH . 'assets/images/';
        $patterns = ['*.jpg','*.jpeg','*.png','*.webp'];
        $files = [];
        foreach ($patterns as $p) {
            $files = array_merge($files, glob($imagesDir . $p));
        }

        // Index DB rows by image name
        $existing = [];
        foreach ($photoRows as $row) {
            $key = strtolower(basename((string)($row['image'] ?? '')));
            if ($key !== '') { 
                $existing[$key] = true; 
            }
        }

        // Add filesystem photos not in DB
        foreach ($files as $f) {
            $name = basename($f);
            if ($name === 'placeholder.jpg' || $name === 'placeholder.svg') {
                continue;
            }
            $key = strtolower($name);
            if (!isset($existing[$key])) {
                $photoRows[] = [
                    'id' => 0,
                    'title' => pathinfo($name, PATHINFO_FILENAME),
                    'caption' => '',
                    'image' => $name,
                    'created_at' => date('Y-m-d H:i:s', filemtime($f) ?: time()),
                ];
            }
        }

        return $this->response->setBody(view('admin/gallery/index', [
            'photos' => $photoRows,
            'totalPhotos' => is_array($photoRows) ? count($photoRows) : 0,
            'success' => $this->session->getFlashdata('success'),
            'error' => $this->session->getFlashdata('error')
        ]));
    }

    /**
     * Normalize a multiline textarea into a comma-separated string for DB storage.
     * Accepts either null/empty and returns null in that case.
     */
    protected function normalizeMultiline($value)
    {
        if ($value === null) return null;
        $lines = preg_split('/\r?\n/', trim((string)$value));
        $filtered = array_values(array_filter(array_map('trim', $lines), function($v){ return $v !== ''; }));
        if (empty($filtered)) return null;
        return implode(', ', $filtered);
    }

    /**
     * Normalize specifications textarea (Key: Value per line) into plain text
     * that the view can render. Keep as text for easy editing in admin.
     */
    protected function normalizeSpecText($value)
    {
        if ($value === null) return null;
        $raw = trim((string)$value);
        return $raw === '' ? null : $raw;
    }

    public function createPhoto(): ResponseInterface
    {
        return $this->response->setBody(view('admin/gallery/create'));
    }

    public function storePhoto(): ResponseInterface
    {
        $rules = [
            'image_file' => [
                'uploaded[image_file]',
                'mime_in[image_file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[image_file,4096]',
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                           ->withInput()
                           ->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('image_file');
        if (!$file->isValid()) {
            return redirect()->back()
                           ->with('error', 'File tidak valid');
        }

        try {
            $targetDir = FCPATH . 'assets/images';
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0775, true);
            }

            $newName = $file->getRandomName();
            $file->move($targetDir, $newName);

            $photoModel = new PhotoModel();
            $photoModel->insert([
                'title' => $this->request->getPost('title'),
                'caption' => $this->request->getPost('caption'),
                'image' => $newName,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            return redirect()->to(base_url('admin/gallery'))
                           ->with('success', 'Foto berhasil diunggah');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Gagal mengunggah foto');
        }
    }

    public function editPhoto($id): ResponseInterface
    {
        $model = new PhotoModel();
        $row = $model->find($id);
        if (!$row) {
            return $this->response->setStatusCode(404)->setBody('Photo not found');
        }
        return $this->response->setBody(view('admin/gallery/edit', ['photo' => $row]));
    }

    public function updatePhoto($id): ResponseInterface
    {
        $model = new PhotoModel();
        $data = $this->request->getPost();

        $file = $this->request->getFile('image_file');
        if ($file && $file->isValid()) {
            $targetDir = FCPATH . 'assets/images';
            if (!is_dir($targetDir)) mkdir($targetDir, 0775, true);
            $newName = $file->getRandomName();
            $file->move($targetDir, $newName);
            $data['image'] = $newName;
        }

        try {
            $model->update($id, $data);
            $this->session->setFlashdata('success', 'Photo updated');
        } catch (\Exception $e) {
            $this->session->setFlashdata('error', 'Failed to update photo');
        }
        return redirect()->to(base_url('admin/gallery'));
    }

    public function deletePhoto($id): ResponseInterface
    {
        $model = new PhotoModel();
        try {
            $row = $model->find($id);
            if ($row && !empty($row['image'])) {
                $path = FCPATH . 'assets/images/' . $row['image'];
                if (is_file($path)) @unlink($path);
            }
            $model->delete($id);
            $this->session->setFlashdata('success', 'Photo deleted');
        } catch (\Exception $e) {
            $this->session->setFlashdata('error', 'Failed to delete photo');
        }
        return redirect()->to(base_url('admin/gallery'));
    }
}