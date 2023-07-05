<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkriteria extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'rentang_min', 'rentang_max', 'bobot'];

    protected $table = 'subkriteria';
}
