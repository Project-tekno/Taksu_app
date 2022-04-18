<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTari extends Model
{

    protected $table            = 'tari';
    protected $primaryKey       = 'id_tari';
    protected $allowedFields    = ['durasi', 'harga', 'tari', 'sanggar', 'gambar'];
}
