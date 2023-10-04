<?php

namespace App\Models;

use CodeIgniter\Model;

class BencanaModel extends Model
{
    protected $table      = 'bencana_alam';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_bencana', 'keterangan', 'waktu', 'rekomendasi'];

    public function getBencana($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}