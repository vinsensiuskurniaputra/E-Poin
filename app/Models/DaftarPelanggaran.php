<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarPelanggaran extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    
    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
