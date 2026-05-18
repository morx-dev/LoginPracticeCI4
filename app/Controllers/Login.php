<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login'); 
    }

    public function autenticar()
    {

        $session = session();
        $usuarioModel = new UsuarioModel();
        
        $usuario = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');

        $user = $usuarioModel->where('usuario', $usuario)->first();

        if ($user) {
            // Por ahora validación simple (luego usaremos password_verify)
            if (password_verify($password, $user['password'])) {
                $session->set(['usuario' => $user['usuario'], 'logged_in' => true]);
                return "¡Bienvenido, " . $user['usuario'] . "! Has iniciado sesión.";
            }
        }
        return redirect()->back()->with('error', 'Usuario o contraseña incorrectos');
    }
}