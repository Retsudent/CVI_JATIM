<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'About - CVI WIROTAMAN'
        ];

        return render('about/index', $data);
    }
}
