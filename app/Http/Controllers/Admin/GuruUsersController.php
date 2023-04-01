<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Users;
use Illuminate\Http\Request;

class GuruUsersController extends Controller
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
        $data = Guru::all();
        $value = [];
        foreach ($data as $item) {
            $value[] = [
                'name' => $item->nama,
                'email' => $item->nik . "@usbnbk.com",
                'password' => bcrypt($item->nik),
                'role' => 'guru',
                'id_pengguna' => $item->id
            ];
        }
        // mengabaikan data yang sudah ada
        Users::insertOrIgnore($value);
        return response([
            'success' => true,
            'message' => 'success'
        ]);

        // return response([
        //     'data' => $value
        // ]);
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
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
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
    public function update(Request $request, Guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        //
    }
}
