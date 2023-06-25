<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianKriteria extends Model
{
    use HasFactory;

    // PenilaianKriteria.php
    public function paketPariwisata()
    {
        return $this->belongsTo(PaketPariwisata::class);
    }
}
