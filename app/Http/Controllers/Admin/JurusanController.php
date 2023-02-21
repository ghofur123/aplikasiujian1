<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Jurusan',
            'data' => Jurusan::with('lembaga')->latest()->get()
        );
        return view('admin.jurusan.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jurusan.store');
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
            'ref_jurusan_id' => 'required',
            'ref_nama_jurusan' => 'required',
            'lembaga_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Jurusan::insert([
            'ref_jurusan_id' => $request->ref_jurusan_id,
            'ref_nama_jurusan' => $request->ref_nama_jurusan,
            'lembaga_id' => $request->lembaga_id,
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
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = array(
            'data' => Jurusan::where([
                'id' => Crypt::decrypt($request->id)
            ])->get()
        );
        return view('admin.jurusan.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = Validator($request->all(), [
            'id' => 'required',
            'ref_jurusan_id' => 'required',
            'ref_nama_jurusan' => 'required',
            'lembaga_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Jurusan::where([
            'id' => Crypt::decrypt($request->id)
        ])->update([
            'ref_jurusan_id' => $request->ref_jurusan_id,
            'ref_nama_jurusan' => $request->ref_nama_jurusan,
            'lembaga_id' => $request->lembaga_id,
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
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Jurusan::where([
            'id' => Crypt::decrypt($request->id)
        ])->delete();
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }
}
