<?php

namespace App\Models;

use App\Models\Student;
use App\Models\DaftarPelanggaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function daftar_pelanggaran(){
        return $this->hasMany(DaftarPelanggaran::class);
    }

}
