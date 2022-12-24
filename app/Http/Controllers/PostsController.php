<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', [
            'postall' => Post::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', [
            'catagories' => Catagory::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $validate_data = request()->validate([
            'title' => 'required|min:3|max:100',
            'body' => 'required|min:5',
            'thumbnail' => 'image',
            'catagory_id' => 'required|exists:catagories,id',
            'tag_id' => 'exists:tags,id',
        ]);
        
        $tags = request('tag_id');
        $tag = Tag::find($tags);
        $post = Post::create(request()->except('_token', 'tag_id'));

        if(request()->hasFile('thumbnail')){
            $ext = request()->file('thumbnail')->getClientOriginalExtension();
            $file_name = $post->id.'.'.$ext;
            request()->file('thumbnail')->move('images/post', $file_name);
            $post->update([
                'thumbnail' => $file_name,
            ]);
        }

        $post->tags()->attach($tag);
        return redirect(url('/posts'))->with('successdismiss', 'Post upload succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show', [
            'post' => Post::find($id),
            'catagories' => Catagory::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.edit', [
            'post' => Post::find($id),
            'catagories' => Catagory::all(),
            'tags' => Tag::all(),
        ]);
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
        $validate_data = request()->validate([
            'title' => 'required|min:3|max:100',
            'body' => 'required|min:5',
            'thumbnail' => 'image',
            'catagory_id' => 'required|exists:catagories,id',
            'tag_id' => 'exists:tags,id',
        ]);

        $tags = request('tag_id');
        $tag = Tag::find($tags);

        $post = Post::find($id);
        $post->update(request()->except('_token', 'tag_id'));

        if(request()->hasFile('thumbnail')){
            if(File::exists("images/post/$post->thumbnail")){
                File::delete("images/post/$post->thumbnail");
            }

            $ext = request()->file('thumbnail')->getClientOriginalExtension();
            $file_name = $post->id.'.'.$ext;
            request()->file('thumbnail')->move('images/post', $file_name);
            $post->update([
                'thumbnail' => $file_name,
            ]);
        }

        $post->tags()->sync($tag);
        return redirect(url('/posts'))->with('successdismiss', 'Post Update successful....okh!');
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
