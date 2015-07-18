<?php



Route::get('login', array('uses' => 'LoginController@showLogin'));

Route::post('login', array('uses' => 'LoginController@doLogin'));

// API ROUTES ==================================
Route::group(array('prefix' => 'api'), function() {

    Route::resource('notes', 'NoteController',
        array('only' => array('index', 'store', 'destroy')));
});

Route::any('{path?}', function()
{
    return File::get(public_path() . '/angular.html');
})->where("path", ".+");
