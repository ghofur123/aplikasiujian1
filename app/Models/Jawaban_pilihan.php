<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban_pilihan extends Model
{
    use HasFactory;
    protected $table = 'jawaban_pilihan';
    protected $fillable = [
        'siswa_id', 'ujian_id', 'soal_id', 'jawaban'
    ];
}
