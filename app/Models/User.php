<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];
    protected $table = 'users';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function relasiKeuanganNazir()
    {
        return $this->hasMany(KeuanganNazir::class);
    }

    public function relasiProporsi()
    {
        return $this->hasMany(Proporsi::class);
    }

    public function relasiEfisiensi()
    {
        return $this->hasMany(Proporsi::class);
    }

    public function relasiHasilPengelolaan()
    {
        return $this->hasMany(Proporsi::class);
    }
}
