<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@home');

Route::get('/about-us', function(){
	return view('static.about');
});
Route::get('/faq', function(){
	return view('static.faq');
});
Route::get('/suscripcion', function(){
	return view('static.premium');
});
Route::get('/contact', function(){
	return view('static.contact');
});
//Route::get('/faq');
//Route::get('/suscripcion');
//Route::get('/contact');

Route::get('post/{post}','PostsController@show')->name('post.show');
Route::get('posts/catalog','CatalogController@home')->name('post.catalog');
Route::get('categories/{category}','CategoriesController@show')->name('categories.show');
Route::get('tags/{tag}','TagsController@show')->name('tags.show');

Route::group([
	'prefix' => 'admin', 
	'namespace' => 'Admin', 
	'middleware' => 'auth'], 
	function() {
		Route::get('/','AdminController@index')->name('dashboard');
		Route::resource('posts','PostsController', ['except' => 'show', 'as' => 'admin']);
		Route::resource('users','UsersController', ['as' => 'admin']);
		//Route::get('posts', 'PostsController@index')->name('admin.posts.index');
		//Route::get('posts/create', 'PostsController@create')->name('admin.posts.create');
		//Route::post('posts', 'PostsController@store')->name('admin.posts.store');
		//Route::get('posts/{post}', 'PostsController@edit')->name('admin.posts.edit');
		//Route::put('posts/{post}', 'PostsController@update')->name('admin.posts.update');
		Route::post('posts/{post}/photos', 'PhotoController@store')->name('admin.posts.photos.update');
		Route::delete('photos/{photo}', 'PhotoController@destroy')->name('admin.photos.destroy');
		Route::delete('posts/{post}', 'PostsController@destroy')->name('admin.posts.destroy');

		Route::post('users', 'UsersController@update')->name('admin.users.update');
});



Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');