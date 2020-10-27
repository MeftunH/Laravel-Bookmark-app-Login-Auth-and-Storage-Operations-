<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'BookmarksController@index')->name('home');
Route::post('/store', ['as'=>'bookmarks.store','uses'=>'BookmarksController@store']);
Route::delete('/bookmarks/{id}','BookmarksController@destroy');
Route::resource('test','TestController');
Route::get("/user","user@view");
Route::get('/edit-bookmark/{bookmark}','BookmarksController@edit');
Route::put('/edit-bookmark/{bookmark}','BookmarksController@update');
Route::get("/bookmark","user@viewbookmark");
Route::get('/userbookmark/{id?}',"UserBookmark@index")->name('userbookmark');

