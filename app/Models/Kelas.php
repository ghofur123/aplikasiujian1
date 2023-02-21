<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = [
        'nama_kelas',
        'jurusan_id',
        'wali_kelas_id',
    ];
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas_id');
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
    public function ujian()
    {
        return $this->hasMany(Ujian::class);
    }
}
