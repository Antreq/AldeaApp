<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
	protected $fillable = ['title', 'body', 'category_id', 'excerpt', 'user_id'];
    protected $dates = ['published_at'];

    protected static function boot(){
        parent::boot();

        static::deleting(function($post){
            $post->tags()->detach();
            $post->photos->each->delete();
        });
    }

    public function getRouteKeyName(){
        return 'url';
    }

    public function category($value=''){
    	return $this->belongsTo(Category::class);
    }

    public function tags(){
    	return $this->belongsToMany(Tag::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeActive($query){
    	$query -> where('published_at', '>=', Carbon::now());
    }

    public function setTitleAttribute($title){
        $this -> attributes['title'] = $title;

        $url = str_slug($title);

        $duplicateUrlCount = Post::where('url', 'LIKE', "{$url}%")->count();

        if($duplicateUrlCount){
            $url .= "-" . uniqid();
        }

        $this -> attributes['url'] = $url;
    }
}
