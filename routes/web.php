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
    Auth::routes();

    //Route for create, update, show, delete thread
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'ThreadController@index');

    Route::get('/threadList', 'ThreadController@index');
    Route::get('/threadList/create', 'ThreadController@create')
        ->middleware('auth');
    Route::post('/threadList', 'ThreadController@store')
        ->middleware('auth');
    Route::get('/threadList/{thread_id}', 'ThreadController@show');
    Route::get('/threadList/{thread_id}/edit', 'ThreadController@edit')
        ->middleware('auth');
    Route::put('/threadList/{thread_id}', 'ThreadController@update')
        ->middleware('auth');
    Route::delete('/threadList/{thread_id}', 'ThreadController@destroy')
        ->middleware('auth');


    //Route for create, update, show, delete reply
    Route::get('/threadList/{thread_id}/create', 'ThreadController@createrep')
        ->middleware('auth');

    Route::post('/threadList/{thread_id}', 'ThreadController@storerep')
        ->middleware('auth');

    Route::get('/threadList/{thread_id}/show/{reply_id}', 'ThreadController@showrep');
    Route::get('/threadList/{reply_id}/editable', 'ThreadController@editrep')
        ->middleware('auth');

    Route::put('/threadList/edited/{reply_id}', 'ThreadController@updaterep')
        ->middleware('auth');

    Route::delete('/threadList/{reply_id}/delete', 'ThreadController@destroyrep')
        ->middleware('auth');


    //Route to show User List, detail User, update User
    Route::get('/showUser', 'HomeController@showuser');

    Route::get('/showUser/{user_id}', 'HomeController@userdetail');

    Route::get('/showUser/{user_id}/edit', 'HomeController@edit')
        ->middleware('auth');

    Route::put('/showUser/{thread_id}', 'HomeController@update')
        ->middleware('auth');


    //Route for reply reply
    Route::get('/threadList/{reply_id}/createReply', 'ThreadController@creatererep')
        ->middleware('auth');

    Route::post('/threadList/{reply_id}/fin', 'ThreadController@storererep')
        ->middleware('auth');
?>
