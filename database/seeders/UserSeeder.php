<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'nama_user' => 'Muhammad Sugeng Cahyono',
            'email_user' => 'muhammadsugengcahyono@gmail.com',
            'password' => Hash::make('12345678'),
            'alamat_user' => 'kediri',
            'kecamatan_user' => 'Banyakan',
            'notelp_user' => null,
            'foto_user' => null,
            'maps_user' => null,
            'instagram_user' => null,
            'facebook_user' => null,
            'link_user' => null,
        ])->AssignRole('admin');
    }
}
