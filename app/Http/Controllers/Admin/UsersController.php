<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Users',
            'data' => Users::all()
        );
        return view('admin.users.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Siswa::select(
            'siswa.id',
            'siswa.nama as name',
            DB::raw('CONCAT(siswa.id,"-",siswa.nisn,"@", REPLACE(lembaga.nama_lembaga, " ", "."), ".sch.id") as email'),
            'siswa.nik as password'
        )
            ->join('kelas', 'siswa.kelas_id', '=', 'kelas.id')
            ->join('jurusan', 'kelas.jurusan_id', '=', 'jurusan.id')
            ->join('lembaga', 'jurusan.lembaga_id', '=', 'lembaga.id')
            ->where('siswa.kelas_id', Crypt::decrypt($request->kelas_id))
            ->get();

        $value = [];
        foreach ($data as $item) {
            $value[] = [
                'name' => $item->name,
                'email' => $item->email,
                'password' => bcrypt($item->password),
                'role' => 'siswa',
                'id_pengguna' => $item->id
            ];
        }
        // mengabaikan data yang sudah ada
        Users::insertOrIgnore($value);
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}
