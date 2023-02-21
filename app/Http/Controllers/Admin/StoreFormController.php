<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreFormController extends Controller
{
    public function lembaga()
    {
        return view('admin.lembaga.store');
    }
    public function guru()
    {
        return view('admin.guru.store');
    }
    public function guruExcel()
    {
        return view('admin.guru.upload_excel');
    }
    public function siswaExcel()
    {
        return view('admin.siswa.upload_excel');
    }
}
