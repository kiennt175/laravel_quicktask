<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{language}', 'HomeController@changeLanguage')
        ->name('user.change-language');

    Route::get('/', 'HomeController@welcome');
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('tasks', 'TaskController');
});
