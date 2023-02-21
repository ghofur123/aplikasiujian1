<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankSoalPilihan;
use App\Models\Mapel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BankSoalPilihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Bank Soal Pilihan',
            'data' => BankSoalPilihan::with('mapel')->latest()->get()
        );
        return view('admin.bank_soal_pilihan.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'mapel' => Mapel::orderBy('nama', 'asc')->get()
        );
        return view('admin.bank_soal_pilihan.store', $data);
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
            'nama' => 'required',
            'mapel_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        BankSoalPilihan::insert([
            'nama' => $request->nama,
            'mapel_id' => $request->mapel_id,
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
     * @param  \App\Models\BankSoalPilihan  $bankSoalPilihan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = array(
            'mapel' => Mapel::orderBy('nama', 'asc')->get(),
            'bank_soal' => BankSoalPilihan::where([
                'id' => Crypt::decrypt($request->id)
            ])->get(),
        );
        return view('admin.bank_soal_pilihan.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankSoalPilihan  $bankSoalPilihan
     * @return \Illuminate\Http\Response
     */
    public function edit(BankSoalPilihan $bankSoalPilihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankSoalPilihan  $bankSoalPilihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = Validator($request->all(), [
            'nama' => 'required',
            'mapel_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        BankSoalPilihan::where([
            'id' => Crypt::decrypt($request->id)
        ])->update([
            'nama' => $request->nama,
            'mapel_id' => $request->mapel_id,
            'created_at' => Carbon::now('Asia/Jakarta'),
        ]);
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankSoalPilihan  $bankSoalPilihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        BankSoalPilihan::where([
            'id' => Crypt::decrypt($request->id)
        ])->delete();
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }
}
