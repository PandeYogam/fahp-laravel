<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    protected $guarded = ['id'];
    // protected $fillable = ['nama', 'slug', 'user_id', 'harga', 'popularitas', 'rating', 'durasi', 'deskripsi', 'jumlah_wisata_dikunjungi'];

    use HasFactory;

    protected $table = 'paket_wisata';

    public function pariwisataPosts()
    {
        return $this->belongsToMany(Post::class, 'paketwisata_pariwisata', 'paketwisata_id', 'post_id');
    }


    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hasilperangkingan()
    {
        return $this->belongsTo(HasilPerangkingan::class, 'hasil_perangkingan_id');
    }

    public function fotos()
    {
        return $this->hasMany(FotoWisata::class);
    }
}
