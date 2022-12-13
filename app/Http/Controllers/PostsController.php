<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

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
            'catagory_id' => 'required|exists:catagories,id',
        ]);

        // dd($validate_data);
        Post::create($validate_data);

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
        return view('posts.edit', [
            'post' => Post::find($id),
            'catagories' => Catagory::all(),
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
            'catagory_id' => 'required|exists:catagories,id',
        ]);

        Post::find($id)->update($validate_data);

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
