<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Tingkat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Mata Pelajaran',
            'data' => Mapel::join('kelas', 'mapel.kelas_id', '=', 'kelas.id')
                ->select('mapel.*', 'kelas.nama_kelas as nama_kelas')
                ->orderBy('mapel.created_at', 'desc')
                ->get()
        );
        return view('admin.mapel.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'data' => Kelas::orderBy('nama_kelas', 'ASC')->get()
        );
        return view('admin.mapel.store', $data);
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
            'mata_pelajaran_id' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Mapel::insert([
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
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
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = array(
            'data' => Mapel::where([
                'id' => Crypt::decrypt($request->id)
            ])->get(),
            'kelas' => Kelas::all()
        );
        return view('admin.mapel.edit', $data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = Validator($request->all(), [
            'id' => 'required',
            'mata_pelajaran_id' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Mapel::where([
            'id' => Crypt::decrypt($request->id)
        ])->update([
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
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
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Mapel::where([
            'id' => Crypt::decrypt($request->id)
        ])->delete();
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }
}
