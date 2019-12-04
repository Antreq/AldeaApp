<?php

USE App\Tag;
use App\Post;
use Carbon\Carbon;
use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');
    	Post::truncate();
    	Category::truncate();
        Tag::truncate();

    	$category = new Category();
    	$category -> name = "Categoria 1";
    	$category -> save();

    	$category = new Category();
    	$category -> name = "Categoria 2";
    	$category -> save();

        $post = new Post;
        $post -> title = "Mi primer post";
        $post -> url = str_slug("Mi primer post");
        $post -> excerpt = "Extracto de mi primer post";
        $post -> body = "<p>Este es el cuerpo de mi primer post</p>";
        $post -> published_at = Carbon::now()->addDays(1);
        $post -> category_id = 1;
        $post-> user_id=1;
        $post -> save();

        $post -> tags() -> attach(Tag::create(['name' => 'Informatica']));

        $post = new Post;
        $post -> title = "Mi segundo post";
        $post -> url = str_slug("Mi segundo post");
        $post -> excerpt = "Extracto de mi segundo post";
        $post -> body = "<p>Este es el cuerpo de mi segundo post</p>";
        $post -> published_at = Carbon::now()->addDays(2);
        $post -> category_id = 2;
        $post-> user_id=2;
        $post ->save();
        
        $post -> tags() -> attach(Tag::create(['name' => 'Geografía']));

        $post = new Post;
        $post -> title = "Mi tercer post";
        $post -> url = str_slug("Mi tercer post");
        $post -> excerpt = "Extracto de mi tercer post";
        $post -> body = "<p>Este es el cuerpo de mi tercer post</p>";
        $post -> published_at = Carbon::now()->addDays(3);
        $post -> category_id = 1;
        $post-> user_id=1;
        $post ->save();

        $post -> tags() -> attach(Tag::create(['name' => 'Administración']));
    }
}
