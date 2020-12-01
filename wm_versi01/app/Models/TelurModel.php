<?php

namespace App\Models;

use CodeIgniter\Model;

class TelurModel extends Model
{
    protected $table      = 'telur';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'harga', 'deskripsi', 'sampul',];

    public function getTelur($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
