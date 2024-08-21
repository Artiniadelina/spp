<?php

namespace App\Models;

use CodeIgniter\Model;

class SppModel extends Model
{
    protected $table = 'spp';
    protected $primaryKey = 'id_spp';

    protected $allowedFields = ['tahun', 'nominal'];

    // Optional: Add validation rules or custom methods if needed
}
