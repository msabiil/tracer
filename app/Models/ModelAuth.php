<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function saveregister($data)
    {
        $this->db->table('alumni')->insert($data);
    }

    public function login($username, $password)
    {
        return $this->db->table('alumni')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }
}
