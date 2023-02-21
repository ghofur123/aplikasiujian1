<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaImportController extends Controller
{
    public function siswaImport(Request $request)
    {
        $file = $request->file('file');
        $fileName = uniqid() . str_replace(' ', '', $file->getClientOriginalName());
        // upload file
        $file->move('public/excel', $fileName);
        // import excel to mysql
        Excel::import(new SiswaImport, public_path('excel/' . $fileName));
        // // mmberi delay
        sleep(5);
        // // delete file
        unlink(public_path('excel/' . $fileName));
        return response([
            'success' => true,
            'message' => 'data berhasil di simpan'
        ]);
    }
}
