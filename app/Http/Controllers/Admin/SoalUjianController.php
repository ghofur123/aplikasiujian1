<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankSoalPilihan;
use App\Models\Soal;
use App\Models\Soal_ujian;
use App\Models\SoalUjian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SoalUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = array(
            'title' => 'Soal Ujian',
            'ujian_id' => $request->id,
            'BankSoalPilihan' => BankSoalPilihan::select('bank_soal_pilihan.id', 'bank_soal_pilihan.nama', 'mapel.nama AS mapel', 'kelas.nama_kelas', 'lembaga.nama_lembaga')
                ->join('mapel', 'bank_soal_pilihan.mapel_id', '=', 'mapel.id')
                ->join('kelas', 'mapel.kelas_id', '=', 'kelas.id')
                ->join('jurusan', 'kelas.jurusan_id', '=', 'jurusan.id')
                ->join('lembaga', 'jurusan.lembaga_id', '=', 'lembaga.id')
                // ->where('bank_soal_pilihan.nama', 'like', '%sdss%')
                ->orderBy('bank_soal_pilihan.id', 'DESC')
                ->get()
        );
        return view('admin.soal_ujian.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ujian_id = Crypt::decrypt($request->ujian_id);
        $data = array(
            'data' => Soal::select('soal.id', 'soal.soal', 'soal.a', 'soal.b', 'soal.c', 'soal.d', 'soal.e', 'soal.jawaban', 'soal.pembahasan', 'soal_ujian.soal_id')
                ->join('bank_soal_pilihan', 'soal.bank_soal_pilihan_id', '=', 'bank_soal_pilihan.id')
                ->leftJoin('soal_ujian', function ($join) use ($ujian_id) {
                    $join->on('soal.id', '=', 'soal_ujian.soal_id')
                        ->where('soal_ujian.ujian_id', '=', $ujian_id);
                })
                ->where('soal.bank_soal_pilihan_id', '=', Crypt::decrypt($request->id))
                ->get()
        );
        // return response($data);
        return view('admin.soal_ujian.view_soal', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator($request->all(), [
            'ujian_id' => 'required',
            'soal_id' => 'required',
        ]);

        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }

        $data = array(
            'uniq' => Crypt::decrypt($request->ujian_id) . "9999" . $request->soal_id,
            'ujian_id' => Crypt::decrypt($request->ujian_id),
            'soal_id' => $request->soal_id,
            'created_at' => Carbon::now('Asia/Jakarta'),
        );
        SoalUjian::insertOrIgnore($data);
        return response([
            'success' => true,
            'message' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal_ujian  $soal_ujian
     * @return \Illuminate\Http\Response
     */
    public function show(Soal_ujian $soal_ujian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soal_ujian  $soal_ujian
     * @return \Illuminate\Http\Response
     */
    public function edit(Soal_ujian $soal_ujian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soal_ujian  $soal_ujian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soal_ujian $soal_ujian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal_ujian  $soal_ujian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        SoalUjian::where([
            'ujian_id' => Crypt::decrypt($request->ujian_id),
            'soal_id' => $request->soal_id,
        ])->delete();
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }
}
