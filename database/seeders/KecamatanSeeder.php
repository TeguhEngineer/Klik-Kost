<?php

namespace Database\Seeders;

use App\Models\kecamatan;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kecamatan::create([
            'nama_kc' => 'Cipedes',
        ]);
        kecamatan::create([
            'nama_kc' => 'Cihideung',
        ]);
        kecamatan::create([
            'nama_kc' => 'Cibereum',
        ]);
        kecamatan::create([
            'nama_kc' => 'Bungursari',
        ]);
        kecamatan::create([
            'nama_kc' => 'Indihiang',
        ]);
        kecamatan::create([
            'nama_kc' => 'Kawalu',
        ]);
        kecamatan::create([
            'nama_kc' => 'Mangkubumi',
        ]);
        kecamatan::create([
            'nama_kc' => 'Purbaratu',
        ]);
        kecamatan::create([
            'nama_kc' => 'Tamansari',
        ]);
        kecamatan::create([
            'nama_kc' => 'Tawang',
        ]);
    }
}
