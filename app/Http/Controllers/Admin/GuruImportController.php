<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\GuruImport;
use App\Models\Guru;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GuruImportController extends Controller
{
    public function index(Request $request)
    {
        $file = $request->file('file');
        $fileName = uniqid() . str_replace(' ', '', $file->getClientOriginalName());
        // upload file
        $file->move('public/excel', $fileName);
        // import excel to mysql
        Excel::import(new GuruImport, public_path('excel/' . $fileName));
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
