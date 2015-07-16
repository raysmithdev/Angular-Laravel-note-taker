<?php

Route::get('/', function() {

     return view('index');

});

// API ROUTES ==================================
Route::group(array('prefix' => 'api'), function() {

    Route::resource('notes', 'NoteController',
        array('only' => array('index', 'store', 'destroy')));

});
