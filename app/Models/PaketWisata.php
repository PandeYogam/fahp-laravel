<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;

    protected $table = 'paket_wisata';

    public function hasilperangkingan()
    {
        return $this->belongsTo(HasilPerangkingan::class, 'hasil_perangkingan_id');
    }
}
