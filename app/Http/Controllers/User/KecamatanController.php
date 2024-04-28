<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\areaKampus;
use App\Models\kecamatan;
use App\Models\kost;
use App\Models\User;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{

    

    public function filter_kecamatan($id)
    {
        $kecamatan = kost::where('kecamatan_id', $id)->with('user');
        $namaKec   = kecamatan::where('id', $id);
        // $kos = User::where('status', 'aktif')->with('kost');

        return view('page.User.filterKecamatan', [
            'kecamatan' => $kecamatan->get(),
            'cek'       => $kecamatan->first(),
            'namaKec' => $namaKec->first(),

            //untuk halaman rekomendasi
            'dataKec'   =>kecamatan::all(),
            'dataKps' =>areaKampus::all(),
            // 'dataKos'   =>$kos->get(),
            'dataKos'   =>kost::with('user')->get(),
            'cekData'   =>kost::with('user')->first(),
        ]);
    }

   
}
