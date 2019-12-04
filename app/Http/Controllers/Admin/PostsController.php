<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
   public function index(){

      if(auth()->user()->hasRole('Admin')){
         $posts = Post::all();
      }
      else{
         $posts = auth()->user()->posts;
      }
      
   	return view('admin.posts.index', compact('posts'));
   }

   /*public function create(){
   	$categories = Category::all();
   	$tags = Tag::all();
   	return view('admin.posts.create',compact('categories','tags'));
   }*/

   public function store(Request $request){

      $this->authorize('create',new Post);
      
      $this->validate($request, ['title'=>'required']);

      //$post = Post::create($request -> only('title') );
      $post = Post::create([
         'title'=> $request -> get('title'),
         'user_id' => auth()->id(),
      ]);
      return redirect()->route('admin.posts.edit', $post);

   }

   public function update(Post $post, StorePostRequest $request){
      $this->authorize('update', $post);
   	$post -> title = $request->get('title');
   	$post -> body = $request->get('body');
   	$post -> excerpt = $request->get('excerpt');
   	$post -> published_at =  Carbon::createFromFormat('d/m/Y', $request->get('published_at'));
   	$post -> category_id = $request->get('category');
   	$post->save();

      $tags = collect($request->get('tags'))->map(function($tag){
         return Tag::find($tag) ? $tag : tag::create(['name'=> $tag])->id;
      });

   	$post->tags()->sync($tags);

   	return redirect()
         ->route('admin.posts.edit', $post)
         ->with('flash','La publicacion ha sido guardada');
   }

   public function edit(Post $post){
      $this->authorize('view', $post);
      $categories = Category::all();
      $tags = Tag::all();
      return view('admin.posts.edit',compact('categories','tags', 'post'));
   }

   public function destroy(Post $post){
      $this->authorize('delete', $post);
      $post->delete();

      return redirect()
         ->route('admin.posts.index', $post)
            ->with('flash','La publicacion ha sido eliminada');
   }
}
