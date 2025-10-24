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
		$rules = [
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                           ->withInput()
                           ->with('errors', $this->validator->getErrors());
        }

		$username = trim($this->request->getPost('username'));
		$password = $this->request->getPost('password');

		$users = new \App\Models\UserModel();
		$user = $users->where('username', $username)->first();

		if ($user && password_verify($password, (string) ($user['password_hash'] ?? ''))) {
			session()->set([
				'isLoggedIn' => true,
				'username' => $user['username'],
				'role' => $user['role'] ?? 'admin',
				'user_id' => $user['id']
			]);
			
			return redirect()->to(base_url('admin'));
		}

		return redirect()->back()
                       ->withInput()
                       ->with('error', 'Username atau password salah');
	}

	public function logout(): ResponseInterface
	{
		session()->destroy();
		return redirect()->to(base_url('login'));
	}
}


