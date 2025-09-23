<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
	public function index(): ResponseInterface
	{
		$session = session();
		if (!$session->get('isLoggedIn')) {
			return $this->response->redirect('http://localhost:8080/login');
		}

		return $this->response->setBody(view('admin/dashboard'));
	}
}


