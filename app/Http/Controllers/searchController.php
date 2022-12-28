<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function searchCatagory(Catagory $catagory)
    {
        $post = $catagory->posts()->paginate(5);

        return view('posts.catagorywise', [
            'posts' => $post,
            'catagories' => Catagory::all(),
            'tags' => Tag::all(),
            'allposts' => Post::all(),
        ]);
    }
}
