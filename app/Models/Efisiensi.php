<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Efisiensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'efisiensis';

    public function relasiKeuanganNazir()
    {
        return $this->belongsTo(KeuanganNazir::class);
    }

    public function relasiUser()
    {
        return $this->belongsTo(User::class);
    }
}
