<?php namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\PetugasModel;
use App\Models\SppModel;

class Pembayaran extends BaseController
{
    protected $pembayaranModel;
    protected $petugasModel;
    protected $sppModel;

    public function __construct()
    {
        $this->pembayaranModel = new PembayaranModel();
        $this->petugasModel = new PetugasModel();
        $this->sppModel = new SppModel();
    }

    public function index()
    {
        $data = [
            'pembayaran' => $this->pembayaranModel->findAll(),
            'petugas' => $this->petugasModel->findAll(),
            'spp' => $this->sppModel->findAll()
        ];
        return view('pembayaran', $data);
    }

    public function store()
    {
        $this->pembayaranModel->save([
            'id_petugas' => $this->request->getPost('id_petugas'),
            'nisn' => $this->request->getPost('nisn'),
            'tgl_bayar' => $this->request->getPost('tgl_bayar'),
            'bulan_dibayar' => $this->request->getPost('bulan_dibayar'),
            'tahun_dibayar' => $this->request->getPost('tahun_dibayar'),
            'id_spp' => $this->request->getPost('id_spp'),
            'jumlah_bayar' => $this->request->getPost('jumlah_bayar')
        ]);

        return redirect()->to('/pembayaran');
    }

    public function edit($id)
    {
        $pembayaran = $this->pembayaranModel->find($id);
        return $this->response->setJSON($pembayaran);
    }

    public function update()
    {
        $this->pembayaranModel->save([
            'id_pembayaran' => $this->request->getPost('id_pembayaran'),
            'id_petugas' => $this->request->getPost('id_petugas'),
            'nisn' => $this->request->getPost('nisn'),
            'tgl_bayar' => $this->request->getPost('tgl_bayar'),
            'bulan_dibayar' => $this->request->getPost('bulan_dibayar'),
            'tahun_dibayar' => $this->request->getPost('tahun_dibayar'),
            'id_spp' => $this->request->getPost('id_spp'),
            'jumlah_bayar' => $this->request->getPost('jumlah_bayar')
        ]);

        return redirect()->to('/pembayaran');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_pembayaran');
        $this->pembayaranModel->delete($id);

        return redirect()->to('/pembayaran');
    }
}
