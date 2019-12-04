<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category){

    	$categories = Category::all();
    	
    	return view('/posts/catalog',[
    		'categories' => $categories,
    		'category' => $category,
    		'posts' => $category->posts()->paginate(4)
    	]);

    }
}
