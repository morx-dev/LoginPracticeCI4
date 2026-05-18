<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $model = new \App\Models\UsuarioModel();

        $data = [
            'usuario'  => 'admin',
            'email'    => 'admin@gmail.com',
            // password_hash crea el código secreto que password_verify puede leer
            'password' => password_hash('12345', PASSWORD_BCRYPT), 
        ];

        // Esto actualizará el usuario si ya existe o lo creará si no
        $model->save($data);
    }
    
}
