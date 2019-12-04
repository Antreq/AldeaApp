<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{


    public function home(){

    	$posts = Post::active()->paginate(5);
    	
    	return view('welcome', compact('posts'));
    }
}
