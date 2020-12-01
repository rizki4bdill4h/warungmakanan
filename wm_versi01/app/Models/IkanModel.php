<?php

namespace App\Models;

use CodeIgniter\Model;

class IkanModel extends Model
{
    protected $table      = 'ikan';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'harga', 'deskripsi', 'sampul',];

    public function getIkan($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
