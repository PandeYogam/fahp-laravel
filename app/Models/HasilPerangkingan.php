<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPerangkingan extends Model
{
    use HasFactory;

    protected $table = 'hasil_perangkingan';

    public function hasildss()
    {
        return $this->belongsTo(HasilDss::class, 'hasil_dss_id');
    }

    public function paketwisata()
    {
        return $this->hasMany(PaketWisata::class, 'paket_wisata_id');
    }
}
