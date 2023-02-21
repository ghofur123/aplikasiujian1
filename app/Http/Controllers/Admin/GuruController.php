<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Guru',
            'data' => Guru::with('lembaga')->latest()->get()
        );
        return view('admin.guru.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guru.store');
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
            'nik' => 'required|numeric',
            'nama' => 'required',
            'jkl' => 'required',
            'agama' => 'required',
            'tlp' => 'required|numeric',
            'lembaga_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Guru::insert([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jkl' => $request->jkl,
            'agama' => $request->agama,
            'tlp' => $request->tlp,
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
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = array(
            'data' => Guru::where([
                'id' => Crypt::decrypt($request->id)
            ])->get()
        );
        return view('admin.guru.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = Validator($request->all(), [
            'id' => 'required',
            'nik' => 'required|numeric',
            'nama' => 'required',
            'jkl' => 'required',
            'agama' => 'required',
            'tlp' => 'required|numeric',
            'lembaga_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Guru::where([
            'id' => Crypt::decrypt($request->id)
        ])->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jkl' => $request->jkl,
            'agama' => $request->agama,
            'tlp' => $request->tlp,
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
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Guru::where([
            'id' => Crypt::decrypt($request->id)
        ])->delete();
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }
}
