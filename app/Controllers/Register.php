<?php namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        return view('register');
    }

    public function create()
    {
        $model = new UserModel();

        // Mendapatkan data dari formulir
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');

        // Validasi data
        if (empty($username) || empty($password) || empty($role)) {
            session()->setFlashdata('error', 'Please fill in all fields.');
            return redirect()->to('/register');
        }

        // Cek apakah username sudah ada
        if ($model->where('username', $username)->first()) {
            session()->setFlashdata('error', 'Username already exists.');
            return redirect()->to('/register');
        }

        // Hash password dan simpan data pengguna
        $data = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'role'     => $role
        ];

        $model->save($data);

        session()->setFlashdata('success', 'Registration successful. You can now log in.');
        return redirect()->to('/');
    }
}
