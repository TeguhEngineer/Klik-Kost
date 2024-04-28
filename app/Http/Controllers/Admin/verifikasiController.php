<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class verifikasiController extends Controller
{
    public function index() {
        $data = User::where('status','non-aktif');
        return view('page.Admin.verifikasi.index',[
            'verifikasi'    =>$data->get()
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'status'       => 'required',
        ]);
        // dd(request()->all());
        $validateData['status'] = 'aktif';
        User::find($id)->update($validateData);
        return back()->with('verifikasi','');
    }
}
