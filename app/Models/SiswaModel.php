<?php namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'nisn';

    protected $allowedFields = ['nis', 'nama', 'id_kelas', 'alamat', 'no_telp', 'id_spp'];
}
