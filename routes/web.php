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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Login
Route::get('{provider}/auth', 'SocialController@auth')->name('social.auth');
Route::get('{provider}/redirect', 'SocialController@auth_callback')->name('social.callback');


Route::group(['middleware' => ['auth']], function () {

    Route::resource('channels', 'ChannelsController');

    Route::resource('discussions', 'DiscussionController');
    Route::post('discussions/reply/{id}','DiscussionController@reply')->name('discussion.reply');
    Route::get('discussions/watch/{id}','WatchersController@watch')->name('discussion.watch');
    Route::get('discussions/unwatch/{id}','WatchersController@unwatch')->name('discussion.unwatch');


    Route::resource('forums', 'ForumsController');
    Route::get('channel/{slug}', 'ForumsController@channel')->name('channel.filter');

    Route::get('reply/like/{id}','LikesController@like')->name('reply.like');
    Route::get('reply/unlike/{id}','LikesController@unlike')->name('reply.unlike');

    Route::get('replies/best/reply/{id}', 'RepliesController@best_answer')->name('replies.bestanswer');
    
});
