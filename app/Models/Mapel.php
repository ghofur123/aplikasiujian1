<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel';
    protected $fillable = [
        'mata_pelajaran_id',
        'nama',
        'kelas_id'
    ];
    public function ujian()
    {
        return $this->hasMany(Ujian::class);
    }
    public function bank_soal_pilihan()
    {
        return $this->hasMany(BankSoalPilihan::class);
    }
}
