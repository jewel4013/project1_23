<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    public function searchByStatus(){
        $statusCount = $this->posts()->where('status', 1)->get();
        return $statusCount;
    }

    
}
