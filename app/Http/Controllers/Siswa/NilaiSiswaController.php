<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiSiswaController extends Controller
{
    public function index(Request $request)
    {
        $data = array(
            'data_nilai' => Soal::join('jawaban_pilihan', 'jawaban_pilihan.soal_id', '=', 'soal.id')
                ->join('ujian', 'jawaban_pilihan.ujian_id', '=', 'ujian.id')
                ->where('jawaban_pilihan.siswa_id', '=', auth()->user()->id_pengguna)
                ->where('ujian.id', '=', 1)
                ->select(
                    DB::raw('ROUND(SUM(IF(soal.jawaban = jawaban_pilihan.jawaban, 1, 0)) * (100 / ujian.jumlah_soal)) AS nilai'),
                    DB::raw('SUM(IF(soal.jawaban = jawaban_pilihan.jawaban, 1, 0)) AS benar'),
                    DB::raw('SUM(IF(soal.jawaban != jawaban_pilihan.jawaban, 1, 0)) AS salah'),
                    DB::raw('ROUND((100 / ujian.jumlah_soal)) poin_per_soal')
                )
                ->groupBy('ujian.jumlah_soal')
                ->get()
        );
        return response($data);
    }
}
