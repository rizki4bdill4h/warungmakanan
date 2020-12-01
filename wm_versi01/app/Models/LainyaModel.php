<?php

namespace App\Models;

use CodeIgniter\Model;

class LainyaModel extends Model
{
    protected $table      = 'lainya';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'harga', 'deskripsi', 'sampul',];

    public function getLainya($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
