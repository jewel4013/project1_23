<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        request()->validate([
            'comment_body' => 'required|min:1'
        ]);

        $post = Post::find($id);
        $post->comments()->create([
            'comment_body' => request('comment_body'),
            'user_id' => auth()->id(),
        ]);

        return back()->with('successdismiss', 'Comment success!');
    }



    /*
        Like store
    */
    public function likeStore(Request $request, $id)
    {
        $post = Post::find($id);
        $like = $post->likes()->where('user_id', auth()->id())->first();
        if($like)
        {
            $like->delete();
            return back();
        }
        $post->likes()->create([
            'user_id' => auth()->id(),
        ]);
        return back();
    }

    public function commentLikeStore(Comment $comment)
    {
        $like = $comment->likes()->where('user_id', auth()->id())->first();
        if($like)
        {
            $like->delete();
            return back();
        }
        $comment->likes()->create([
            'user_id' => auth()->id(),
        ]);
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
