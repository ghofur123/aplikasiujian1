<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tingkat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TingkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Tingkat',
            'data' => Tingkat::with('lembaga')->latest()->get()
        );
        return view('admin.tingkat.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tingkat.store');
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
            'tingkat_lembaga' => 'required',
            'limit_pilihan' => 'required',
            'lembaga_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Tingkat::insert([
            'tingkat_lembaga' => $request->tingkat_lembaga,
            'limit_pilihan' => $request->limit_pilihan,
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
     * @param  \App\Models\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = array(
            'data' => Tingkat::where([
                'id' => Crypt::decrypt($request->id)
            ])->get()
        );
        return view('admin.tingkat.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function edit(Tingkat $tingkat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = Validator($request->all(), [
            'id' => 'required',
            'tingkat_lembaga' => 'required',
            'limit_pilihan' => 'required',
            'lembaga_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Tingkat::where([
            'id' => Crypt::decrypt($request->id)
        ])->update([
            'tingkat_lembaga' => $request->tingkat_lembaga,
            'limit_pilihan' => $request->limit_pilihan,
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
     * @param  \App\Models\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Tingkat::where([
            'id' => Crypt::decrypt($request->id)
        ])->delete();
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }
}
