<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    protected $fillable = ['nama', 'slug', 'user_id', 'harga', 'popularitas', 'rating', 'durasi', 'deskripsi', 'jumlah_wisata_dikunjungi'];

    use HasFactory;

    protected $table = 'paket_wisata';

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hasilperangkingan()
    {
        return $this->belongsTo(HasilPerangkingan::class, 'hasil_perangkingan_id');
    }
}
