<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lembaga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LembagaController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Lembaga',
            'data' => Lembaga::latest()->get()
        );
        return view('admin.lembaga.table', $data);
    }
    public function show(Request $request)
    {
        $data = array(
            'data' => Lembaga::where([
                'id' => Crypt::decrypt($request->id)
            ])->get()
        );
        return view('admin.lembaga.edit', $data);
    }
    public function store(Request $request)
    {
        $validation = Validator($request->all(), [
            'npsn' => 'required',
            'nama_lembaga' => 'required',
            'alamat' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Lembaga::insert([
            'npsn' => $request->npsn,
            'nama_lembaga' => $request->nama_lembaga,
            'alamat' => $request->alamat,
            'created_at' => Carbon::now('Asia/Jakarta')
        ]);
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }
    public function update(Request $request)
    {
        $validation = Validator($request->all(), [
            'id' => 'required',
            'npsn' => 'required',
            'nama_lembaga' => 'required',
            'alamat' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }
        Lembaga::where([
            'id' => $request->id
        ])->update([
            'npsn' => $request->npsn,
            'nama_lembaga' => $request->nama_lembaga,
            'alamat' => $request->alamat,
            'updated_at' => Carbon::now('Asia/Jakarta'),

        ]);
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }
    public function destroy(Request $request)
    {
        Lembaga::where([
            'id' => Crypt::decrypt($request->id)
        ])->delete();
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }
}
