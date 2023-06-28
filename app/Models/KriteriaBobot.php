<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaBobot extends Model
{
    use HasFactory;

    protected $table = 'kriteria_bobot';

    public function hasildss()
    {
        return $this->belongsTo(HasilDss::class, 'hasil_dss_id');
    }
}
