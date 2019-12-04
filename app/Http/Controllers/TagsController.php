<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Category;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Tag $tag){

    	$categories = Category::all();
    	
    	return view('posts/catalog',[
    		'categories' => $categories,
    		'tag' => $tag,
    		'posts' => $tag->posts()->paginate(4)
    	]);
    }
}
