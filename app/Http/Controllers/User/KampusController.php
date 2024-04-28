<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\areaKampus;
use App\Models\kecamatan;
use App\Models\kost;
use App\Models\User;
use Illuminate\Http\Request;

class KampusController extends Controller
{
    public function filter_kampus($id) {
        $kampus = kost::where('area_id', $id)->with('user');
        $namaKps   = areaKampus::where('id', $id);
        // $kos = User::where('status', 'aktif')->with('kost');

        return view('page.User.filterKampus', [
            'kampus' => $kampus->get(),
            'cek' => $kampus->first(),
            'namaKps' => $namaKps->first(),

            //untuk halaman rekomendasi
            'dataKps' =>areaKampus::all(),
            'dataKec'   =>kecamatan::all(),
            // 'dataKos'   =>$kos->get(),
            'dataKos'   =>kost::with('user')->get(),
            'cekData'   =>kost::with('user')->first(),
        ]); 
    }
}
