<?php
namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // tampilkan form login
    public function login()
    {
        return view('auth/login');
    }

    // proses login
    public function doLogin()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user) {
            // cek password (MD5 sesuai DB)
            if (md5($password) === $user['password']) {
                $session->set([
                    'user_id'   => $user['id'],
                    'name'      => $user['name'],
                    'role'      => $user['role'],
                    'logged_in' => true
                ]);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('error', 'Password salah');
                return redirect()->back();
            }
        } else {
            $session->setFlashdata('error', 'Email tidak ditemukan');
            return redirect()->back();
        }
    }

    // logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
