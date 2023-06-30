<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilBobotVektor extends Model
{
    use HasFactory;

    protected $fillable = [
        'kriteria_1',
        'kriteria_2',
        'kriteria_3',
        'kriteria_4',
        'kriteria_5',
        // 'user_id',
    ];

    protected $table = 'hasil_bobot_vektor';

    public function kriteriaBobot()
    {
        return $this->belongsTo(KriteriaBobot::class, 'kriteria_bobot_id');
    }
}
