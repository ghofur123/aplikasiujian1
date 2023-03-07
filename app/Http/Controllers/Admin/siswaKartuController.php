<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class siswaKartuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = array(
            'data' => Siswa::select(
                'siswa.nama as name',
                DB::raw('CONCAT(siswa.id,"-",siswa.nisn,"@", REPLACE(lembaga.nama_lembaga, " ", "."), ".sch.id") as email'),
                'siswa.nik as password',
                'lembaga.nama_lembaga',
                'lembaga.alamat'
            )
                ->join('kelas', 'siswa.kelas_id', '=', 'kelas.id')
                ->join('jurusan', 'kelas.jurusan_id', '=', 'jurusan.id')
                ->join('lembaga', 'jurusan.lembaga_id', '=', 'lembaga.id')
                ->where('siswa.kelas_id', Crypt::decrypt($request->id))
                ->get()
        );
        return view('admin.siswa.kartu-absensi.kartu', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(siswa $siswa)
    {
        //
    }
}
