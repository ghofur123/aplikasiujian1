<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Soal;
use App\Models\ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UjianSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::where('id', auth()->user()->id_pengguna)->get();
        $kelas = "";
        foreach ($siswa as $item) {
            $kelas = $item->kelas_id;
        }
        $data = array(
            'data' => Ujian::with('kelas')
                ->with('mapel')
                ->where([
                    'kelas_id' => $kelas,
                    'status' => 'aktif'
                ])
                ->latest()
                ->get()
        );
        return view('siswa.ujian.table', $data);
    }

    public function number(Request $request)
    {
        $data = array(
            'ujian_id' => $request->id,
            'data' => soal::select('soal.id', 'jawaban_pilihan.soal_id', 'jawaban_pilihan.jawaban')
                ->leftJoin('jawaban_pilihan', function ($join) {
                    $join->on('soal.id', '=', 'jawaban_pilihan.soal_id')
                        ->where('jawaban_pilihan.siswa_id', '=', auth()->user()->id_pengguna);
                })
                ->join('soal_ujian', 'soal.id', '=', 'soal_ujian.soal_id')
                ->join('ujian', 'soal_ujian.ujian_id', '=', 'ujian.id')
                ->where('ujian.id', Crypt::decrypt($request->id))
                ->orderBy('soal.id', 'ASC')
                ->get()
        );
        return view('siswa.ujian.number', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('siswa.ujian.mulai_ujian');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = array(
            // 'data' => Soal::where('id', Crypt::decrypt($request->id))->get(),
            'data' => Soal::select('soal.id', 'soal.soal', 'soal.a', 'soal.b', 'soal.c', 'soal.d', 'soal.e', 'jawaban_pilihan.jawaban', 'jawaban_pilihan.soal_id')
                ->leftJoin('jawaban_pilihan', function ($join) {
                    $join->on('soal.id', '=', 'jawaban_pilihan.soal_id')
                        ->where('jawaban_pilihan.siswa_id', '=', auth()->user()->id_pengguna);
                })
                ->where('soal.id', '=', Crypt::decrypt($request->id))
                ->get()
        );
        // return response([
        //     'data' => $data
        // ]);
        return view('siswa.ujian.soal', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function edit(ujian $ujian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ujian $ujian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function destroy(ujian $ujian)
    {
        //
    }
}
