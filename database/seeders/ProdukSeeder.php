<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::Create([
            'nama_produk' => 'ini produk',
            'harga_produk' => '1000000',
            'kategori_produk' => 'hasil bumi',
            'gambar1_produk' => '1720157350_Dashboard.png',
            'gambar2_produk' => '1720157350_Dashboard.png',
            'gambar3_produk' => '1720157350_Dashboard.png',
            'deskripsi_produk' => 'hjsdhfjdsfgbdsguyfb',
            'shopee_produk' => 'hjsdhfjdsfgbdsguyfb',
            'id_user' => '29',
        ]);
    }
}
