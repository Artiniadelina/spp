<?php namespace App\Controllers;

use App\Models\PetugasModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function do_login()
    {
        $model = new PetugasModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'id_petugas' => $user['id_petugas'],
                'username' => $user['username'],
                'level' => $user['level'],
                'logged_in' => true,
            ]);

            if ($user['level'] === 'admin') {
                return redirect()->to('/admin_home');
            } elseif ($user['level'] === 'petugas') {
                return redirect()->to('/petugas_home');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function do_register()
    {
        $model = new PetugasModel();
        $username = $this->request->getPost('username');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $nama_petugas = $this->request->getPost('nama_petugas');
        $level = $this->request->getPost('level');

        $model->save([
            'username' => $username,
            'password' => $password,
            'nama_petugas' => $nama_petugas,
            'level' => $level
        ]);

        return redirect()->to('/login')->with('success', 'Registration successful');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
