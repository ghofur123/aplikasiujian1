<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Jawaban_pilihan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class JawabanPilihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "okk";
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
            'soal_id' => 'required',
            'jawaban' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Jawaban_pilihan::updateOrInsert(
            [
                'siswa_id' => auth()->user()->id_pengguna,
                'ujian_id' => Crypt::decrypt($request->ujian_id),
                'soal_id' => Crypt::decrypt($request->soal_id)
            ],
            [
                'jawaban' => $request->jawaban,
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
     * @param  \App\Models\Jawaban_pilihan  $jawaban_pilihan
     * @return \Illuminate\Http\Response
     */
    public function show(Jawaban_pilihan $jawaban_pilihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jawaban_pilihan  $jawaban_pilihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jawaban_pilihan $jawaban_pilihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jawaban_pilihan  $jawaban_pilihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jawaban_pilihan $jawaban_pilihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jawaban_pilihan  $jawaban_pilihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jawaban_pilihan $jawaban_pilihan)
    {
        //
    }
}
