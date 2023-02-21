<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ButtonController extends Controller
{
    public function buttonDelete(Request $request)
    {
        $data = array(
            'id' => $request->id,
            'link' => $request->link
        );
        return view('admin.templates.delete', $data);
    }
}
