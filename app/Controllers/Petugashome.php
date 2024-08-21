<?php

namespace App\Controllers;

use App\Models\PetugasModel;
use CodeIgniter\Controller;

class Petugashome extends Controller
{
    protected $petugasModel;

    public function __construct()
    {
        $this->petugasModel = new PetugasModel();
    }

    public function index()
    {
        $data['petugas'] = $this->petugasModel->findAll();
        return view('datapetugas', $data);
    }

    public function create()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'nama_petugas' => $this->request->getPost('nama_petugas'),
            'level' => $this->request->getPost('level'),
        ];

        $this->petugasModel->save($data);
        return redirect()->to('/petugas');
    }

    public function update()
    {
        $idPetugas = $this->request->getPost('id_petugas');
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'nama_petugas' => $this->request->getPost('nama_petugas'),
            'level' => $this->request->getPost('level'),
        ];

        $this->petugasModel->update($idPetugas, $data);
        return redirect()->to('/petugas');
    }

    public function delete()
    {
        $idPetugas = $this->request->getPost('id_petugas');
        $this->petugasModel->delete($idPetugas);
        return redirect()->to('/petugas');
    }

    public function get_by_id()
    {
        $idPetugas = $this->request->getGet('id_petugas');
        $petugas = $this->petugasModel->find($idPetugas);
        return $this->response->setJSON($petugas);
    }
}
