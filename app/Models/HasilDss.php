<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilDss extends Model
{
    use HasFactory;

    protected $table = 'hasil_dss';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kriteriaBobot()
    {
        return $this->belongsTo(KriteriaBobot::class, 'kriteria_bobot_id');
    }

    public function hasilPerangkingan()
    {
        return $this->belongsTo(HasilPerangkingan::class, 'hasil_perangkingan_id');
    }
    public function hasilbobotvektor()
    {
        return $this->belongsTo(HasilBobotVektor::class, 'hasil_bobot_vektor_id');
    }
}
