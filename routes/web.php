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

use Illuminate\Support\Facades\Route;

Route::get('/post/{post}', 'Site\PostController@show')->name('posts.public.single');
Route::get('/', 'Site\PostController@index')->name('welcome');

Route::post('comments/{post}', 'Site\CommentController@store')->name('comments.store');

Route::post('ratings/{post}', 'Site\RatingController@store')->name('ratings.store');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('posts', 'Admin\AdminController');
    Route::get('trash_post', 'Admin\AdminController@trash')->name('trashpost');
    Route::post('trashrestore/{id}', 'Admin\AdminController@trashrestore')->name('trashrestore');
});

Route::get('/contato', function () {
    return view('contact.index');
});
