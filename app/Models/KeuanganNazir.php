<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeuanganNazir extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'keuangan_nazirs';

    public function relasiProporsi()
    {
        return $this->hasOne(Proporsi::class);
    }

    public function relasiEfisiensi()
    {
        return $this->hasOne(Efisiensi::class);
    }

    public function relasiHasilPengelolaan()
    {
        return $this->hasOne(HasilPengelolaan::class);
    }

    public function relasiUser()
    {
        return $this->belongsTo(User::class);
    }
}
