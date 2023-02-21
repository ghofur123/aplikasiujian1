<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $fillable = [
        'nama_jurusan',
        'bidang_studi',
        'lembaga_id',
    ];
    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class, 'lembaga_id');
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'jurusan_id');
    }
}
