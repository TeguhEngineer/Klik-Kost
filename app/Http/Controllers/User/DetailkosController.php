<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\areaKampus;
use App\Models\detailFasilitas;
use App\Models\gambar;
use App\Models\kecamatan;
use App\Models\kost;
use Illuminate\Http\Request;

class DetailkosController extends Controller
{
    public function detail_kos($id)
    {
        return view('page.User.detailKos', [
            'detailKos' => kost::where('id', $id)->with('user')->first(),
            'gambarKos'        =>gambar::where('kost_id', $id)->get(),
            'fasilitas' => detailFasilitas::where('kost_id', $id)->get(),
            'cekFas' => detailFasilitas::where('kost_id', $id)->first(),

            // Untuk foreach filter search
            'dataKec'   =>kecamatan::all(),
            'dataKps' =>areaKampus::all(),
        ]);
    }
}
