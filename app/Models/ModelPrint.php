<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPrint extends Model
{
    public function alldata()
    {
        return $this->db->table('alumni')->get()->getResult();
    }
}
