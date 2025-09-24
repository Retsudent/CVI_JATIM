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

		$users = new \App\Models\UserModel();
		$user = $users->where('username', $username)->first();

		if ($user && password_verify($password, (string) ($user['password_hash'] ?? ''))) {
			$session->set([
				'isLoggedIn' => true,
				'username' => $user['username'],
				'role' => $user['role'] ?? 'admin',
			]);
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


