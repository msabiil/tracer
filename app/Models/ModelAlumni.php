<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAlumni extends Model
{
    public function alldata()
    {
        return $this->db->table('alumni')->get()->getResult();
    }

    public function alldatakusionerr()
    {
        return $this->db->table('kuisioner')->get()->getResult();
    }
}

//menampilkan data alumni di table