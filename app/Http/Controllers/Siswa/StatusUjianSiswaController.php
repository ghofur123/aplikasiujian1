<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Status_ujian_siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class StatusUjianSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validation = Validator($request->all(), [
            'ujian_id' => 'required',
            'status' => 'required'
        ]);

        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }

        Status_ujian_siswa::updateOrInsert(
            [
                'siswa_id' => auth()->user()->id_pengguna,
                'ujian_id' => Crypt::decrypt($request->ujian_id)
            ],
            [
                'status' => $request->status,
                'created_at' => Carbon::now('Asia/Jakarta')
            ]
        );
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status_ujian_siswa  $status_ujian_siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Status_ujian_siswa $status_ujian_siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status_ujian_siswa  $status_ujian_siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Status_ujian_siswa $status_ujian_siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status_ujian_siswa  $status_ujian_siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status_ujian_siswa $status_ujian_siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status_ujian_siswa  $status_ujian_siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status_ujian_siswa $status_ujian_siswa)
    {
        //
    }
}
