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
        $data = [
            'title' => 'Campground - CVI WIROTAMAN',
            'campgrounds' => $this->campgroundModel->getAllCampgrounds()
        ];

        return view('campground/index', $data);
    }

    public function detail($id)
    {
        $campground = $this->campgroundModel->find($id);
        
        if (!$campground) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Campground not found');
        }

        $data = [
            'title' => $campground['name'] . ' - CVI WIROTAMAN',
            'campground' => $campground
        ];

        return view('campground/detail', $data);
    }
}



