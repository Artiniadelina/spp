<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use CodeIgniter\Controller;

class Datasiswa extends Controller
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $data['siswa'] = $this->siswaModel->findAll();
        return view('datasiswa', $data);
    }

    public function create()
    {
        $model = new SiswaModel();
        $data = [
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama'),
            'id_kelas' => $this->request->getPost('id_kelas'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
            'id_spp' => $this->request->getPost('id_spp'),
        ];

        if ($model->insert($data)) {
            return redirect()->to(base_url('datasiswa'));
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data.');
        }
    }

    public function update()
    {
        $nisn = $this->request->getPost('nisn');
        $data = [
            'nama' => $this->request->getPost('nama'),
            'id_kelas' => $this->request->getPost('id_kelas'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
            'id_spp' => $this->request->getPost('id_spp'),
        ];

        $this->siswaModel->update($nisn, $data);
        return redirect()->to('/datasiswa');
    }

    public function delete()
    {
        $nisn = $this->request->getPost('nisn');
        $this->siswaModel->delete($nisn);
        return redirect()->to('/datasiswa');
    }

    public function get_by_nisn()
    {
        $nisn = $this->request->getGet('nisn');
        $siswa = $this->siswaModel->find($nisn);
        return $this->response->setJSON($siswa);
    }
}
