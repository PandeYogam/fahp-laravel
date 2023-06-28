<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilBobotVektor extends Model
{
    use HasFactory;

    protected $table = 'hasil_bobot_vektor';

    public function kriteriaBobot()
    {
        return $this->belongsTo(KriteriaBobot::class, 'kriteria_bobot_id');
    }
}
