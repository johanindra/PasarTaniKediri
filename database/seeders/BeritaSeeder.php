<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berita::Create([
            'judul_berita' => 'ini berita',
            'tanggal_berita' => now(),
            'foto_berita' => '1720157350_Dashboard.png',
            'deskripsi_berita' => 'hjsdhfjdsfgbdsguyfb',
            'id_user' => '1',
        ]);
    }
}
