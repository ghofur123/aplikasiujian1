<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    use HasFactory;
    protected $table = 'lembaga';
    protected $fillable = [
        'npsn', 'nama_lembaga', 'alamat'
    ];
    public function Guru()
    {
        return $this->hasMany(Guru::class);
    }
    public function jurusan()
    {
        return $this->hasMany(Jurusan::class);
    }
    public function tingkat()
    {
        return $this->hasMany(Tingkat::class);
    }
}
