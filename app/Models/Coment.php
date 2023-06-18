<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function children()
    {
        return $this->hasMany(Coment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function hasLike()
    {
        return $this->hasOne(ComentLike::class)->where('user_id', Auth::user()->id);
    }

    public function totalLikes()
    {
        return $this->hasMany(ComentLike::class)->count();
    }
}
