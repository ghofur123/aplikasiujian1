<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Soal;
use App\Models\Status_ujian_siswa;
use App\Models\ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

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
        return view('siswa.ujian.terstruktur.table', $data);
    }

    public function number(Request $request)
    {
        $idUjian = Crypt::decrypt($request->id);
        $data = array(
            'ujian_id' => $request->id,
            'status_ujian' => Soal::select(
                DB::raw('COALESCE(COUNT(soal.id), 0) AS jumlah'),
                DB::raw('COALESCE(SUM(IF(soal.jawaban = jawaban_pilihan.jawaban, 1, 0)), 0) AS benar'),
                DB::raw('COALESCE(SUM(IF(soal.jawaban != jawaban_pilihan.jawaban, 1, 0)), 0) AS salah'),
                DB::raw('COALESCE(ROUND(SUM(IF(soal.jawaban = jawaban_pilihan.jawaban, 1, 0)) * (100 / ujian.jumlah_soal)), 0) AS nilai'),
                DB::raw('COALESCE(IF(status_ujian_siswa.status = "selesai", "selesai", "tidak"), "belum") AS status'),
                DB::raw('COALESCE(IF(COUNT(jawaban_pilihan.id) = ujian.jumlah_soal, "selesai", "belum"), "belum") AS status_jumlah_jawaban'),
                'ujian.id AS ujian_id'
            )
                ->join('jawaban_pilihan', 'jawaban_pilihan.soal_id', '=', 'soal.id')
                ->join('bank_soal_pilihan', 'bank_soal_pilihan.id', '=', 'soal.bank_soal_pilihan_id')
                ->join('ujian', 'ujian.id', '=', 'jawaban_pilihan.ujian_id')
                ->leftJoin('status_ujian_siswa', function ($join) {
                    $join->on('status_ujian_siswa.ujian_id', '=', 'jawaban_pilihan.ujian_id')
                        ->on('status_ujian_siswa.siswa_id', '=', 'jawaban_pilihan.siswa_id');
                })
                ->where('jawaban_pilihan.ujian_id', '=', Crypt::decrypt($request->id))
                ->where('jawaban_pilihan.siswa_id', '=', auth()->user()->id_pengguna)
                ->groupBy('ujian.id', 'ujian.jumlah_soal', 'status_ujian_siswa.status')
                ->havingRaw('COUNT(soal.id) > 0')
                ->unionAll(DB::table('Soal')
                    ->select(DB::raw('0, 0, 0, 0, "Tidak ada data yang ditemukan", "Tidak ada data yang ditemukan", 0'))
                    ->whereNotExists(function ($query) use ($idUjian) {
                        $query->select(DB::raw(1))
                            ->from('Soal')
                            ->join('jawaban_pilihan', 'jawaban_pilihan.soal_id', '=', 'soal.id')
                            ->where('jawaban_pilihan.ujian_id', '=', $idUjian)
                            ->where('jawaban_pilihan.siswa_id', '=', auth()->user()->id_pengguna);
                    }))
                ->limit('1')
                ->get(),
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
        return view('siswa.ujian.terstruktur.number', $data);

        // return response($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('siswa.ujian.terstruktur.mulai_ujian');
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
            'data' => Soal::leftJoin('jawaban_pilihan', function ($join) {
                $join->on('jawaban_pilihan.soal_id', '=', 'soal.id')
                    ->where('jawaban_pilihan.siswa_id', '=', auth()->user()->id_pengguna);
            })
                ->leftJoin('status_ujian_siswa', function ($join) {
                    $join->on('status_ujian_siswa.siswa_id', '=', 'jawaban_pilihan.siswa_id')
                        ->where('status_ujian_siswa.siswa_id', '=', auth()->user()->id_pengguna);
                })
                ->select('soal.id', 'soal.soal', 'soal.a', 'soal.b', 'soal.c', 'soal.d', 'soal.e', 'jawaban_pilihan.jawaban', 'jawaban_pilihan.soal_id', 'status_ujian_siswa.siswa_id')
                ->where('soal.id', '=', Crypt::decrypt($request->id))
                ->limit('1')
                ->get()
        );
        // return response([
        //     'data' => $data
        // ]);
        return view('siswa.ujian.terstruktur.soal', $data);
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
