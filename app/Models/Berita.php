<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = "berita";
    protected $primaryKey = "id_berita";
    public $timestamps = true;

    protected $fillable = [
        'judul_berita',
        'tanggal_berita',
        'foto_berita',
        'deskripsi_berita',
        'id_user',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
