<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_ujian_siswa extends Model
{
    use HasFactory;
    protected $table = "status_ujian_siswa";
    protected $fillable = [
        'siswa_id', 'ujian_id', 'status'
    ];
}
