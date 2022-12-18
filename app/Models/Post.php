<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

    public function thumbnail_path(){
        return asset("images/post/$this->thumbnail");
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
