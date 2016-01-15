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



Route::group(array('middleware' => 'guest'), function () {

    Route::group(array('before' => 'csrf'), function () {
        Route::post('/auth/login', array('as' => 'admin-login-post',
            'uses' => 'AdminController@postLogin'));
    });
    Route::get('/auth/login', array('as' => 'admin-login','uses' => 'AdminController@getLogin'));

});

Route::group(array('middleware' => 'auth'), function () {


    Route::get('/auth/logout', array('as' => 'admin-log-out','uses' => 'AdminController@Logout'));


    Route::get('/', array('as' => 'main', 'uses' => 'AdminController@mainPage'));

    Route::get('/add/song', array('as' => 'add-song', 'uses' => 'AdminController@AddSongPage'));
    Route::post('/add/song', array('as' => 'add-song-post', 'uses' => 'AdminController@postAddSong'));
    //ekleme işleminden sonra update işlemi için.
    Route::post('/update/song/{song_id}', array('as' => 'update-song-post', 'uses' => 'AdminController@postUpdateSong'));
    Route::get('/edit/songs', array('as' => 'edit-songs', 'uses' => 'AdminController@EditSongPage'));
    Route::post('/edit/song', array('as' => 'edit-my-song', 'uses' => 'AdminController@EditMySong'));

    Route::get('/delete/song/{song_id}', array('as' => 'delete-song', 'uses' => 'AdminController@DeleteSong'));

    //panelde muzikleri çalabilmek için.
    Route::get('/secureplay/{url}', array('as'   => 'secureplay','uses' => 'AdminController@secureplay'));
});


//---    api ---///
Route::group(array('prefix' => 'api/v1', 'middleware' => 'CheckApiKey'), function ()
{
    Route::get('/songs', array('as' => 'songs', 'uses' => 'ApiController@Songs'));
    Route::get('/topsongs', array('as' => 'topsongs', 'uses' => 'ApiController@TopSongs'));
    Route::post('/listen/{sond_id}', array('as' => 'listen', 'uses' => 'ApiController@Listen'));
});


