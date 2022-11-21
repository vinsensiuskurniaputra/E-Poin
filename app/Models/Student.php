<?php

namespace App\Models;

use App\Models\DaftarPelanggaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function class()
    {
        return $this->belongsTo(TheClass::class, 'the_class_id');

    }
    public function daftar_pelanggaran()
    {
        return $this->hasMany(DaftarPelanggaran::class);

    }
}
