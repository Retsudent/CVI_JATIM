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
        $data = [
            'title' => 'Merchandise - CVI WIROTAMAN',
            'merchandise' => $this->merchandiseModel->getAllMerchandise()
        ];

        return view('merchandise/index', $data);
    }

    public function detail($id)
    {
        $merchandise = $this->merchandiseModel->find($id);
        
        if (!$merchandise) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Merchandise not found');
        }

        $data = [
            'title' => $merchandise['name'] . ' - CVI WIROTAMAN',
            'merchandise' => $merchandise
        ];

        return view('merchandise/detail', $data);
    }
}



