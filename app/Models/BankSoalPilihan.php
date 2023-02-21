<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSoalPilihan extends Model
{
    use HasFactory;
    protected $table = 'bank_soal_pilihan';
    protected $fillable = [
        'nama',
        'mapel_id',
    ];
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
