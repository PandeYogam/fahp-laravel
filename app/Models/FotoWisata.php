<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoWisata extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    
    public function paketWisata()
    {
        return $this->belongsTo(PaketWisata::class);
    }
}
