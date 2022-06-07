<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\HTTP\Request;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login_check()
    {
        $loginModel = new LoginModel();
        $login = $this->request->getPost('login');
        $error = '';
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username == '' or $password == '') {
            $error = "Silahkan masukkan username dan password";
        }
        if (empty($error)) {
            $datauser = $loginModel->where('name', $username)->first();
            if (empty($datauser)) {
                $error = "Username Salah!";
            } else {
                if ($datauser['password'] != $password) {
                    $error = "Password tidak sesuai!";
                }
            }
        }
        if (empty($error)) {
            $datasesi = [
                'id' => $datauser['id'],
                'username' => $datauser['name'],
                'password' => $datauser['password']
            ];
            session()->set($datasesi);
            return redirect()->to('pages');
        }
        if ($error) {
            session()->setFlashdata('error', $error);
            return redirect()->to('login');
        }

        echo "hello";
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
