<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Kelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Kelas',
            'data' => Kelas::with(['jurusan', 'guru'])->latest()->get()
        );
        return view('admin.kelas.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'data_jurusan' => Jurusan::orderBy('ref_nama_jurusan', 'ASC')->get(),
            'data_guru' => Guru::orderBy('nama', 'ASC')->get()
        );
        return view('admin.kelas.store', $data);
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
            'nama_kelas' => 'required',
            'jurusan_id' => 'required',
            'wali_kelas_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Kelas::insert([
            'nama_kelas' => $request->nama_kelas,
            'jurusan_id' => $request->jurusan_id,
            'wali_kelas_id' => $request->wali_kelas_id,
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
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = array(
            'data' => Kelas::where([
                'id' => Crypt::decrypt($request->id)
            ])->get(),
            'data_jurusan' => Jurusan::orderBy('ref_nama_jurusan', 'ASC')->get(),
            'data_guru' => Guru::orderBy('nama', 'ASC')->get()
        );
        return view('admin.kelas.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = Validator($request->all(), [
            'id' => 'required',
            'nama_kelas' => 'required',
            'jurusan_id' => 'required',
            'wali_kelas_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Kelas::where([
            'id' => Crypt::decrypt($request->id)
        ])->update([
            'nama_kelas' => $request->nama_kelas,
            'jurusan_id' => $request->jurusan_id,
            'wali_kelas_id' => $request->wali_kelas_id,
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
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Kelas::where([
            'id' => Crypt::decrypt($request->id)
        ])->delete();
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }
}
