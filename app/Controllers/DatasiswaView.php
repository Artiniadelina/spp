<?php namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KelasModel;

class DatasiswaView extends BaseController
{
    protected $siswaModel;
    protected $kelasModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        // Use the builder for SiswaModel
        $builder = $this->siswaModel->builder();
        $builder->select('siswa.*, kelas.nama_kelas');
        $builder->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'left');
        $data['siswa'] = $builder->get()->getResultArray();

        // Return the view with the data
        return view('datasiswa_view', $data);
    }
}
