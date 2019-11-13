<?php

use App\Category;
use App\Http\Resources\UsersResource;
use App\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*
 * @User related
 */
Route::get('/authors' , 'Api\UserController@index');
Route::get('/authors/{id}' , 'Api\UserController@show');
Route::get('/posts/author/{id}' , 'Api\UserController@posts');
Route::get('/comments/author/{id}' , 'Api\UserController@comments');

// End User Related


/**
 * @Category Related
 */
Route::get('/categories' , 'Api\CategoryController@index');
Route::get('/posts/categories/{id}' , 'Api\CategoryController@posts');

Route::get('/posts' , 'Api\PostController@index');
Route::get('/posts/{id}' , 'Api\PostController@show');
Route::get('/comments/posts/{id}' , 'Api\PostController@comments');

// End Posr Related


Route::post('register' , 'Api\UserController@store');
Route::post('token' , 'Api\UserController@gettoken');

Route::middleware('auth:api')-> group(function (){
    Route::post('update-user/{id}' , 'Api\UserController@update');
    Route::post('posts' , 'Api\PostController@store');
    Route::post('posts/{id}' , 'Api\PostController@update');
    Route::delete('posts/{id}' , 'Api\PostController@destroy');

    Route::post('comments/posts/{id}' , 'Api\CommentController@store');
});

