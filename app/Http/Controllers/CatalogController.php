<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function home(){

    	$posts = Post::active()->paginate(4);
    	$categories = Category::all();

    	return view('/posts/catalog', compact('posts','categories'));
    }
}
