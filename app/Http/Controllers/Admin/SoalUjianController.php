<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankSoalPilihan;
use App\Models\Soal_ujian;
use App\Models\SoalUjian;
use Illuminate\Http\Request;

class SoalUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Soal Ujian',
            'BankSoalPilihan' => BankSoalPilihan::with('mapel')->latest()->get()
        );
        return view('admin.soal_ujian.table', $data);
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
     * @param  \App\Models\Soal_ujian  $soal_ujian
     * @return \Illuminate\Http\Response
     */
    public function show(Soal_ujian $soal_ujian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soal_ujian  $soal_ujian
     * @return \Illuminate\Http\Response
     */
    public function edit(Soal_ujian $soal_ujian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soal_ujian  $soal_ujian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soal_ujian $soal_ujian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal_ujian  $soal_ujian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soal_ujian $soal_ujian)
    {
        //
    }
}
