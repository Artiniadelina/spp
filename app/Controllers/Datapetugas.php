<?php

namespace App\Controllers;

use App\Models\PetugasModel;

class Datapetugas extends BaseController
{
    protected $petugasModel;

    public function __construct()
    {
        $this->petugasModel = new PetugasModel();
    }

    // Menampilkan daftar petugas
    public function index()
    {
        $data['petugas'] = $this->petugasModel->findAll();
        return view('datapetugas', $data);
    }

    // Menampilkan data petugas berdasarkan ID
    public function get_by_id()
    {
        $id = $this->request->getGet('id_petugas');
        $petugas = $this->petugasModel->find($id);

        if ($petugas) {
            return $this->response->setJSON($petugas);
        } else {
            return $this->response->setJSON(['error' => 'Data tidak ditemukan']);
        }
    }

    // Menambahkan data petugas
    public function create()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama_petugas' => $this->request->getPost('nama_petugas'),
            'level' => $this->request->getPost('level')
        ];

        $this->petugasModel->insert($data);
        return redirect()->to('/datapetugas');
    }

    // Mengupdate data petugas
    public function update()
    {
        $id = $this->request->getPost('id_petugas');
        $data = [
            'username' => $this->request->getPost('username'),
            'nama_petugas' => $this->request->getPost('nama_petugas'),
            'level' => $this->request->getPost('level')
        ];

        // Jika password diubah, hash password baru
        if (!empty($this->request->getPost('password'))) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->petugasModel->update($id, $data);
        return redirect()->to('/datapetugas');
    }

    // Menghapus data petugas
    public function delete()
    {
        $id = $this->request->getPost('id_petugas');
        $this->petugasModel->delete($id);
        return redirect()->to('/datapetugas');
    }
}
