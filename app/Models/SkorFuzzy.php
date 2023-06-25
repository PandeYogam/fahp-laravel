<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkorFuzzy extends Model
{
    use HasFactory;

    // SkorFuzzy.php
    public function paketPariwisata()
    {
        return $this->belongsTo(PaketPariwisata::class);
    }
}
