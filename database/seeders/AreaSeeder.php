<?php

namespace Database\Seeders;

use App\Models\areaKampus;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //negeri
        areaKampus::create([
            'nama_kps' => 'UNSIL', 
        ]);
        areaKampus::create([
            'nama_kps' => 'UPI',
        ]);
        areaKampus::create([
            'nama_kps' => 'POLTEKKES',
        ]);

        //swasta
        areaKampus::create([
            'nama_kps' => 'UMTAS',
        ]);
        areaKampus::create([
            'nama_kps' => 'UNPER',
        ]);
        areaKampus::create([
            'nama_kps' => 'YPPT',
        ]);
        areaKampus::create([
            'nama_kps' => 'BTH',
        ]);
        areaKampus::create([
            'nama_kps' => 'Poltekes Triguna',
        ]);
        areaKampus::create([
            'nama_kps' => 'STISIP',
        ]);
        areaKampus::create([
            'nama_kps' => 'STT YBSI',
        ]);
        areaKampus::create([
            'nama_kps' => 'LP3I',
        ]);
        areaKampus::create([
            'nama_kps' => 'STAI',
        ]);
        areaKampus::create([
            'nama_kps' => 'Mitra Kencana',
        ]);
        areaKampus::create([
            'nama_kps' => 'Akbid Kebidanan Shahida',
        ]);
        areaKampus::create([
            'nama_kps' => 'Akademi Pariwisata Siliwangi',
        ]);
        areaKampus::create([
            'nama_kps' => 'Politeknik Kesehatan Gigi',
        ]);
        areaKampus::create([
            'nama_kps' => 'Dirgantara Pilot School',
        ]);
        areaKampus::create([
            'nama_kps' => 'STIT',
        ]);
        areaKampus::create([
            'nama_kps' => 'STAINU',
        ]);
        areaKampus::create([
            'nama_kps' => 'UBSI',
        ]);
    }
}
