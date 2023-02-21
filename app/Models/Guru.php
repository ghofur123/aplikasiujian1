<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $fillable = [
        'nik',
        'nama',
        'jkl',
        'agama',
        'tlp',
        'lembaga_id',
    ];
    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class, 'lembaga_id');
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'wali_kelas_id');
    }
}
