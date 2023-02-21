<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Login Ujian'
        );
        return view('admin.login.login', $data);
    }
    public function login(Request $request)
    {

        $validation = Validator($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success'   => false,
                'message' => 'Email atau Password tidak boloh kosong'
            ]);
        }
        // // mengambil data user berdasarkan email yang dikirm
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'success'   => false,
                'message' => 'Email atau Password salah'
            ]);
        }
        // //jika kondisi di atas bisa dilewati, selanjutnya buatlah token baru
        $token = $user->createToken('ApiToken')->plainTextToken;
        $response = [
            'success'   => true,
            // 'user'      => $user,
            // 'token'     => $token
        ];
        session()->push('token', $token);
        //kembalikan atau tampilkan response
        return response($response);
    }
}
