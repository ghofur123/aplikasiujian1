<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $table = 'soal';
    protected $fillable = [
        'soal',
        'a',
        'b',
        'c',
        'd',
        'e',
        'jawaban',
        'pembahasan',
        'bank_soal_pilihan_id',
    ];
}
