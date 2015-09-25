<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
    //return 'hello';
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
//Route::post('auth/register', function(){return view('welcome');});

// after login routes...
Route::get('homePage', 'Auth\AuthController@getLogin');
//Route::get('home', ['middleware' => 'auth', function(){return view('homePage');}]);

// logout routes...
Route::get('logout', 'Auth\AuthController@getLogout');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Pages routes....
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

// Articles routes...
//Route::get('articles', 'ArticlesController@index');
//Route::get('articles/create', 'ArticlesController@create');
//Route::get('articles/{id}', 'ArticlesController@show');
//Route::post('articles', 'ArticlesController@store');

Route::resource('articles', 'ArticlesController');
Route::get('myArticles', 'ArticlesController@myArticles');
Route::post('articles/{articles}/delete', 'ArticlesController@delete');
Route::get('foo', ['middleware' =>  'manager', function(){
    return 'THIS PAGE MAY ONLY BE VIEWED BY MANAGERS!';
}]);
Route::post('article/{articles}/addComment', 'ArticlesController@addComment');

// Personal Page...
Route::get('blogPage', 'Blog\BlogPagesController@index');

// Admin's Articles controller
Route::get('addTag', 'Admin\ArticlesController@addTag');
Route::post('createTag', 'Admin\ArticlesController@createTag');

//Admin's Users controller
Route::get('manageUser', 'Admin\UsersController@manageUser');
Route::post('deleteUser/{user}', 'Admin\UsersController@deleteUser');