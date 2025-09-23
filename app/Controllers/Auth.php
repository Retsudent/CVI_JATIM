<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
	public function index(): ResponseInterface
	{
		return $this->response->setBody(view('login/index'));
	}

	public function attempt(): ResponseInterface
	{
		$session = session();
		$request = $this->request;
		$username = trim((string) $request->getPost('username'));
		$password = (string) $request->getPost('password');

		// Simple demo auth: single hardcoded user
		$validUser = getenv('APP_ADMIN_USER') ?: 'admin';
		$validPass = getenv('APP_ADMIN_PASS') ?: 'admin123';

		if ($username === $validUser && $password === $validPass) {
			$session->set(['isLoggedIn' => true, 'username' => $username]);
			return $this->response->redirect('http://localhost:8080/admin');
		}

		$session->setFlashdata('error', 'Login gagal. Periksa kembali kredensial Anda.');
		return $this->response->redirect('http://localhost:8080/login');
	}

	public function logout(): ResponseInterface
	{
		$session = session();
		$session->destroy();
		return $this->response->redirect('http://localhost:8080/login');
	}
}


