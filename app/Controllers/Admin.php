<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
	public function index(): ResponseInterface
	{
		$data = [
			'title' => 'Dashboard - Admin CVI Jatim',
			'session' => session()
		];
		return $this->response->setBody(view('admin/dashboard', $data));
	}
}


