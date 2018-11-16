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
Route::group(['middelware' => ['web']], function () {
    

    Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getsingle'])
        ->where('slug', '[\w\d\-\_]+');
    Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
    Route::get('contact', 'PagesController@getContact');
    Route::get('about', 'PagesController@getAbout');
    Route::get('/', 'PagesController@getIndex');
    Route::resource('posts', 'PostController');
});


Auth::routes();

    // categories
    Route::resource('categories', 'CategoryController', ['except' => ['create']]);

    Route::get('/home', 'HomeController@index')->name('home');


    Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'Auth\AdminController@index')->name('admin.dashboard');
});