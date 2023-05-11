<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuzzy extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subKriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }
}
