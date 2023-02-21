<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use Carbon\Carbon;
use Error;
use Exception;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Stmt\Catch_;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session(['bank_soal_pilihan_id' => Crypt::decrypt($request->id)]);
        session(['bank_soal_pilihan_id_encrypt' => $request->id]);

        // Nama folder yang ingin dibuat
        $folder_name = 'public/images/' . Crypt::decrypt($request->id);

        // Buat instance dari class Filesystem
        $filesystem = new Filesystem();

        // Periksa apakah folder sudah ada atau belum
        if (!$filesystem->isDirectory($folder_name)) {
            // Jika belum, buat folder baru
            $filesystem->makeDirectory($folder_name);
        } else {
            // Jika sudah ada, lakukan tindakan lain
            // (misalnya, keluarkan pesan kesalahan atau lakukan operasi lain)
        }
        $data = array(
            'title' => 'Soal',
            'bank_soal_pilihan_id' => $request->id,
            'data' =>
            Soal::where([
                'bank_soal_pilihan_id' => Crypt::decrypt($request->id)
            ])
                ->latest()
                ->get()

        );
        return view('admin.soal.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = array(
            'bank_soal_pilihan_id' => $request->bank_soal_pilihan_id
        );
        return view('admin.soal.store', $data);
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
            'soal' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'e' => 'required',
            'jawaban' => 'required',
            'pembahasan' => 'required',
            'bank_soal_pilihan_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'type' => 'validation',
                'message' => $validation->errors()
            ]);
        }
        $data = array(
            'soal' => $request->soal,
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'e' => $request->e,
            'jawaban' => $request->jawaban,
            'pembahasan' => $request->pembahasan,
            'bank_soal_pilihan_id' => Crypt::decrypt($request->bank_soal_pilihan_id),
            'created_at' => Carbon::now('Asia/Jakarta'),
        );
        Soal::insert($data);
        return response([
            'success' => true,
            'message' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = array(
            'soal' => Soal::where([
                'id' => Crypt::decrypt($request->id)
            ])->get()
        );
        return view('admin.soal.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(Soal $soal)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = Validator($request->all(), [
            'id' => 'required',
            'soal' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'e' => 'required',
            'jawaban' => 'required',
            'pembahasan' => 'required',
            'bank_soal_pilihan_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'type' => 'validation',
                'message' => $validation->errors()
            ]);
        }
        $data = array(
            'soal' => $request->soal,
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'e' => $request->e,
            'jawaban' => $request->jawaban,
            'pembahasan' => $request->pembahasan,
            'bank_soal_pilihan_id' => Crypt::decrypt($request->bank_soal_pilihan_id),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        );
        Soal::where([
            'id' => Crypt::decrypt($request->id)
        ])->update($data);
        return response([
            'success' => true,
            'message' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Soal::where([
            'id' => Crypt::decrypt($request->id)
        ])->delete();
        return response([
            'success' => true,
            'message' => 'success'
        ]);
    }
}
