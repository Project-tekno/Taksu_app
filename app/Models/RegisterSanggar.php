<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterSanggar extends Model
{

    protected $table            = 'sanggar';
    protected $primaryKey       = 'id_sanggar';
    protected $allowedFields    = ['nama_sanggar', 'alamat_sanggar', 'email', 'no_hp', 'username', 'password', 'salt'];
}
