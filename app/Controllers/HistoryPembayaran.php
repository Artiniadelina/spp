<?php namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\PetugasModel;

class HistoryPembayaran extends BaseController
{
    protected $pembayaranModel;
    protected $petugasModel;

    public function __construct()
    {
        $this->pembayaranModel = new PembayaranModel();
        $this->petugasModel = new PetugasModel();
    }

    public function index()
    {
        $builder = $this->pembayaranModel->builder();
        $builder->select('pembayaran.*, petugas.nama_petugas');
        $builder->join('petugas', 'pembayaran.id_petugas = petugas.id_petugas', 'left');
        $data['history'] = $builder->get()->getResultArray();

        return view('history_pembayaran', $data);
    }
}
