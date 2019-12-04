<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function store(Post $post){

    	$this->validate(request(), [
    		'photo' => 'required|image|Max: 2048',
    	]);

        $post->photos()->create([
            'url' => request()->file('photo')->store('posts','public'),
        ]);
    }

    public function destroy(Photo $photo){
        $photo->delete();
        return back() -> with('flash', 'Imagen eliminada');
    }
}
