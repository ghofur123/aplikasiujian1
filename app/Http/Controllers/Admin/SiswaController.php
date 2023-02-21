<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'siswa',
            'data' => Siswa::with('kelas')->latest()->get()
        );
        return view('admin.siswa.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'kelas' => Kelas::orderBy('nama_kelas', 'ASC')->get()
        );
        return view('admin.siswa.store', $data);
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
            'nisn' => 'required|numeric',
            'nik' => 'required|numeric',
            'nama' => 'required',
            'kelas_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Siswa::insert([
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
            'created_at' => now()
        ]);
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = array(
            'siswa' => Siswa::where([
                'id' => Crypt::decrypt($request->id)
            ])->get(),
            'kelas' => Kelas::orderBy('nama_kelas', 'ASC')->get()
        );
        return view('admin.siswa.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = Validator($request->all(), [
            'id' => 'required',
            'nisn' => 'required|numeric',
            'nik' => 'required|numeric',
            'nama' => 'required',
            'kelas_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        $siswa = Siswa::find(Crypt::decrypt($request->id));
        $siswa->nisn = $request->nisn;
        $siswa->nik = $request->nik;
        $siswa->nama = $request->nama;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->updated_at = Carbon::now('Asia/Jakarta');
        $siswa->save();
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Siswa::where([
            'id' => Crypt::decrypt($request->id)
        ])->delete();
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }
}
