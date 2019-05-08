<?php
use App\User;
use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function(){
    // In order to load the view you need to pass the users collection to admin/index view:
   $users = User::all();
   return view('admin.index', compact('users'));
});

Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

Route::group(['middleware'=>'admin'], function(){
	Route::resource('admin/users', 'AdminUsersController');
	Route::resource('admin/posts', 'AdminPostsController');
	Route::resource('admin/categories', 'AdminCategoriesController');
	Route::resource('admin/media', 'AdminMediaController');
	Route::post('admin/media/upload', ['as'=>'admin.media.upload', 'uses'=>'AdminMediaController@store']);
	Route::resource('admin/comments', 'PostCommentsController');
	Route::resource('admin/comment/replies', 'CommentRepliesController');
});

Route::post('comment/reply', 'CommentRepliesController@createReply');