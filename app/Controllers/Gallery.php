<?php

namespace App\Controllers;

class Gallery extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Gallery - CVI WIROTAMAN',
            // In future you can load photos from a model here
            'photos' => []
        ];

        $photoModel = new \App\Models\PhotoModel();
        $photos = $photoModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'title' => 'Gallery - CVI WIROTAMAN',
            'photos' => $photos
        ];

        return render('gallery/index', $data);
    }
}
