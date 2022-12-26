<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        // model event:-> creating, created, deleting, deleted ...
        self::created(function($comment){
            $subscribers = $comment->post->likes;
            
            foreach($subscribers as $subscriber)
            {
                $user = $subscriber->user;
                Mail::raw('A new comment on a post thay you liked', function($message) use($user){
                    $message->to($user->email, 'admin')->subject('New Comment');
                });

            }
        });
    }

    public function woner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }

    public function likeByCurrentUser()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }
}
