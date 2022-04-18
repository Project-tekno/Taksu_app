<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginSanggar extends Model
{
    protected $table            = 'sanggar';
    protected $primaryKey       = 'id_sanggar';

    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;

    protected $allowedFields    = ['nama_sanggar', 'alamat_sanggar', 'email', 'no_hp', 'username', 'salt', 'password'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
}
