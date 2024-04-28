<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\areaKampus;
use App\Models\detailFasilitas;
use App\Models\gambar;
use App\Models\kecamatan;
use App\Models\kost;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        
        $kos = kost::with('user');
        return view('page.User.index', [
            'dataKos' => $kos->get(),
            'cek' => $kos->first(),
            'kecamatan' =>kecamatan::all(),
            'kampus'    =>areaKampus::all()
        ]);
    }

}
