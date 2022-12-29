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
        $post = $catagory->posts()->where('status', 1)->paginate(5);

        return view('welcome', [
            'posts' => $post,
            // 'catagories' => Catagory::all(),  //----->Gloal catagories used
            'tags' => Tag::all(),
            'allposts' => Post::where('status', 1)->get(),
        ]);
    }
}
