<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Tingkat;
use App\Models\Ujian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Ujian',
            'data' => Ujian::with('kelas')
                ->with('mapel')
                ->latest()
                ->get()
        );
        return view('admin.ujian.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'kelas' => Kelas::orderBy('nama_kelas', 'asc')->get(),
            'mapel' => Mapel::orderBy('nama', 'asc')->get()
        );
        return view('admin.ujian.store', $data);
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
            'nama_ujian' => 'required',
            'kelas_id' => 'required',
            'jumlah_soal' => 'required',
            'waktu' => 'required',
            'mapel_id' => 'required',
            'status' => 'required',
            'metode' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Ujian::insert([
            'nama_ujian' => $request->nama_ujian,
            'kelas_id' => $request->kelas_id,
            'jumlah_soal' => $request->jumlah_soal,
            'waktu' => $request->waktu,
            'mapel_id' => $request->mapel_id,
            'status' => $request->status,
            'metode' => $request->metode,
            'created_at' => Carbon::now('Asia/Jakarta'),
        ]);
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = array(
            'ujian' => Ujian::where([
                'id' => Crypt::decrypt($request->id)
            ])->get(),
            'kelas' => Kelas::orderBy('nama_kelas', 'asc')->get(),
            'mapel' => Mapel::orderBy('nama', 'asc')->get()
        );
        return view('admin.ujian.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function edit(Ujian $ujian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = Validator($request->all(), [
            'id' => 'required',
            'nama_ujian' => 'required',
            'kelas_id' => 'required',
            'jumlah_soal' => 'required',
            'waktu' => 'required',
            'mapel_id' => 'required',
            'status' => 'required',
            'metode' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Ujian::where([
            'id' => Crypt::decrypt($request->id)
        ])->update([
            'nama_ujian' => $request->nama_ujian,
            'kelas_id' => $request->kelas_id,
            'jumlah_soal' => $request->jumlah_soal,
            'waktu' => $request->waktu,
            'mapel_id' => $request->mapel_id,
            'status' => $request->status,
            'metode' => $request->metode,
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ]);
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Ujian::where([
            'id' => Crypt::decrypt($request->id)
        ])->delete();
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }
}
