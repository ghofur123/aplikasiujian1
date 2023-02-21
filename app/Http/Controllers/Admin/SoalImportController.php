<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\SoalImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SoalImportController extends Controller
{
    public function soalImportForm()
    {
        return view('admin.soal.upload_excel');
    }
    public function soalImport(Request $request)
    {
        $file = $request->file('file');
        $fileName = uniqid() . str_replace(' ', '', $file->getClientOriginalName());
        // // upload file
        $file->move('public/excel', $fileName);
        // import excel to mysql
        Excel::import(new SoalImport, public_path('excel/' . $fileName));
        // // mmberi delay
        sleep(5);
        // delete file
        unlink(public_path('excel/' . $fileName));
        return response([
            'bank_soal_pilihan_id_encrypt' => session('bank_soal_pilihan_id_encrypt'),
            'success' => true,
            'message' => 'data berhasil di simpan'
        ]);
    }
}
