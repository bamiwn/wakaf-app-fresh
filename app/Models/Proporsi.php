<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proporsi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'proporsis';

    public function relasiKeuanganNazir()
    {
        return $this->belongsTo(KeuanganNazir::class);
    }

    public function relasiUser()
    {
        return $this->belongsTo(User::class);
    }
}
