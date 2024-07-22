<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $table = 'komentar';
    protected $primaryKey = 'id_komentar';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'email',
        'komentar',
        'id_produk',
    ];
}