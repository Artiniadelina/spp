<?php

namespace App\Controllers;

use App\Models\SppModel;

class Dataspp extends BaseController
{
    protected $sppModel;

    public function __construct()
    {
        $this->sppModel = new SppModel();
    }

    // Menampilkan daftar SPP
    public function index()
    {
        $data['spp'] = $this->sppModel->findAll();
        return view('dataspp', $data);
    }

    // Menampilkan data SPP berdasarkan ID
    public function get_by_id()
    {
        $id = $this->request->getGet('id_spp');
        $spp = $this->sppModel->find($id);

        if ($spp) {
            return $this->response->setJSON($spp);
        } else {
            return $this->response->setJSON(['error' => 'Data tidak ditemukan']);
        }
    }

    // Menambahkan data SPP
    public function create()
    {
        $data = [
            'tahun' => $this->request->getPost('tahun'),
            'nominal' => $this->request->getPost('nominal')
        ];

        $this->sppModel->insert($data);
        return redirect()->to('/dataspp');
    }

    // Mengupdate data SPP
    public function update()
    {
        $id = $this->request->getPost('id_spp');
        $data = [
            'tahun' => $this->request->getPost('tahun'),
            'nominal' => $this->request->getPost('nominal')
        ];

        $this->sppModel->update($id, $data);
        return redirect()->to('/dataspp');
    }

    // Menghapus data SPP
    public function delete()
    {
        $id = $this->request->getPost('id_spp');
        $this->sppModel->delete($id);
        return redirect()->to('/dataspp');
    }
}
