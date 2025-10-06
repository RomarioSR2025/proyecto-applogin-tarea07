<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class AuthController extends BaseController
{
    public function dashboard()
    {
        if (! session('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión.');
        }

        return view('dashboard');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function store()
    {
        $userModel = new UsuarioModel();

        
        $validation = $this->validate([
            'username' => 'required|min_length[3]',   
            'email'    => 'required|valid_email|is_unique[usuarios.email]',
            'password' => 'required|min_length[6]',
            'avatar'   => [
                'rules'  => 'if_exist|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
                'errors' => [
                    'is_image' => 'El archivo debe ser una imagen.',
                    'mime_in'  => 'Solo se permiten JPG o PNG.',
                    'max_size' => 'La imagen no debe superar los 2MB.'
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $avatar = null;
        $file = $this->request->getFile('avatar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $avatarName = $file->getRandomName();
            $file->move('uploads/avatars', $avatarName);
            $avatar = 'uploads/avatars/' . $avatarName;
        }


        $userModel->insert([
            'nombre'   => $this->request->getPost('username'), 
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'avatar'   => $avatar
        ]);

        return redirect()->to('/login')->with('success', 'Usuario registrado correctamente.');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function auth()
    {
        $userModel = new UsuarioModel();
        $user = $userModel->where('email', $this->request->getPost('email'))->first();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            session()->set([
                'id'       => $user['id'],
                'nombre'   => $user['nombre'],   
                'email'    => $user['email'],
                'avatar'   => $user['avatar'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Usuario o contraseña incorrectos.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
