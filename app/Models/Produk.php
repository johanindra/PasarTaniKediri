<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = "produk";
    protected $primaryKey = "id_produk";
    public $timestamps = true;

    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'kategori_produk',
        'deskripsi_produk',
        'gambar1_produk',
        'gambar2_produk',
        'gambar3_produk',
        'shopee_produk',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
