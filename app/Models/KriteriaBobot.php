<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaBobot extends Model
{
    use HasFactory;

    protected $table = 'kriteria_bobot';

    protected $fillable = [
        'kriteria_1',
        'kriteria_2',
        'kriteria_3',
        'kriteria_4',
        'kriteria_5',
        'user_id',
    ];

    public function hasildss()
    {
        return $this->belongsTo(HasilDss::class, 'hasil_dss_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
