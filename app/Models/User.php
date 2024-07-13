<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    // public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_user',
        'email_user',
        'password',
        'alamat_user',
        'kecamatan_user',
        'notelp_user',
        'foto_user',
        'maps_user',
        'instagram_user',
        'facebook_user',
        'link_user'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password_user',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isProfileComplete()
    {
        return $this->nama_user && $this->email_user && $this->alamat_user && $this->kecamatan_user && $this->notelp_user && $this->foto_user && $this->maps_user;
    }
    public function getNotelpUserAttribute($value)
{
    // Ubah nomor telepon yang dimulai dengan '08' menjadi '628'
    if (Str::startsWith($value, '0')) {
        return '62' . substr($value, 1);
    }
    return $value;
}

}
