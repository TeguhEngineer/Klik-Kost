<?php

namespace Database\Seeders;

use App\Models\fasilitas;
use Illuminate\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        fasilitas::create([
            'nama_fas' => 'Kasur', 
        ]);
        fasilitas::create([
            'nama_fas' => 'Kipas Angin', 
        ]);
        fasilitas::create([
            'nama_fas' => 'Wifi', 
        ]);
        fasilitas::create([
            'nama_fas' => 'CCTV', 
        ]);
        fasilitas::create([
            'nama_fas' => 'AC', 
        ]);
        fasilitas::create([
            'nama_fas' => 'Dispenser', 
        ]);
        fasilitas::create([
            'nama_fas' => 'Lemari', 
        ]);
    }
}
