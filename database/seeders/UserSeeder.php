<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama_user' => 'Nina',
            'email_user' => 'ninavirgiana931@gmail.com',
            'password' => Hash::make('12345678'),
            'alamat_user' => 'kediri',
            'kecamatan_user' => 'Grogol',
            'notelp_user' => null,
            'foto_user' => null,
            'level_user' => 'admin',
            'maps_user' => null,
            'instagram_user' => null,
            'facebook_user' => null,
            'link_user' => null,
        ]);
    }
}
