<?php

namespace App\Models;

use CodeIgniter\Model;

class ayamModel extends Model
{
    protected $table      = 'ayam';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'harga', 'deskripsi', 'sampul',];

    public function getAyam($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
