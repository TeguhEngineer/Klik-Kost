<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'no_tlp' => '000000000000',
            'alamat_kost' => 'indonesia',
            'link_maps' => 'https://',
            'password' => bcrypt('password'),
            'status' => 'aktif',
            'role' => 'admin',
        ]);

        // Member Aktif
        // User::create([
        //     'name' => 'Member1',
        //     'no_tlp' => '111111111111',
        //     'alamat_kost' => 'indonesia',
        //     'link_maps' => 'https://',
        //     'password' => bcrypt('password'),
        //     'status' => 'aktif',
        //     'role' => 'member',
        // ]);

        // Member Non-aktif
        // User::create([
        //     'name' => 'Member2',
        //     'no_tlp' => '222222222222',
        //     'alamat_kost' => 'indonesia',
        //     'link_maps' => 'https://',
        //     'password' => bcrypt('password'),
        //     'status' => 'non-aktif',
        //     'role' => 'member',
        // ]);
    }
}
