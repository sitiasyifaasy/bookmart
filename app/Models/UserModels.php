<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModels extends Model
{
    protected $table = 'user';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_user', 'email_user', 'telp_user', 'password', 'jns_kelamin', 'level'];
}
