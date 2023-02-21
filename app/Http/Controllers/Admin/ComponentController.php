<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Lembaga;
use App\Models\Ref_Jurusan;
use App\Models\Ref_mata_pelajaran;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function lembaga(Request $request)
    {
        $data = array(
            'data' => Lembaga::where('nama_lembaga', 'LIKE', '%' . $request->search . '%')
                ->orWhere('npsn', 'LIKE', '%' . $request->search . '%')
                ->limit(5)
                ->get()
        );
        return view('admin.component.lembaga', $data);
    }
    public function refJurusan(Request $request)
    {
        $data = array(
            'data' => Ref_Jurusan::where('jurusan_id', 'LIKE', '%' . $request->search . '%')
                ->orWhere('nama_jurusan', 'LIKE', '%' . $request->search . '%')
                ->limit(5)
                ->get()
        );
        return view('admin.component.jurusan', $data);
    }
    public function refMataPelajaran(Request $request)
    {
        $data = array(
            'data' => Ref_mata_pelajaran::where('mata_pelajaran_id', 'LIKE', '%' . $request->search . '%')
                ->orWhere('nama', 'LIKE', '%' . $request->search . '%')
                ->limit(5)
                ->get()
        );
        return view('admin.component.mapel', $data);
    }
    // 
    public function componentFormJurusan()
    {
        return view('admin.component.form_jurusan_autocomplete');
    }
    public function componentFormLembaga()
    {
        return view('admin.component.form_lembaga_autocomplete');
    }
    public function componentFormMapel()
    {
        return view('admin.component.form_mapel_autocomplete');
    }
}
