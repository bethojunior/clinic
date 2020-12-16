<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'user'], function () {
        Route::group(['as' => 'user'], function () {
            Route::get('', 'User\UserController@index')->name('.index');
            Route::get('patients', 'User\UserController@getPatients')->name('.getPatients');
            Route::get('create','User\UserController@create')->name('.create');
            Route::get('createPatient','User\UserController@createPatient')->name('.createPatient');
            Route::post('insert', 'User\UserController@insert')->name('.insert');
            Route::get('{id}', 'User\UserController@findById')->name('.find');
            Route::put('', 'User\UserController@update')->name('.update');
        });
    });

    Route::group(['prefix' => 'timeline'], function () {
        Route::group(['as' => 'timeline'], function () {
            Route::get('{id}', 'Timeline\TimelineController@findById')->name('.findById');
            Route::get('','Timeline\TimelineController@index')->name('.index');
            Route::post('insert','Timeline\TimelineController@create')->name('.create');
        });
    });

    Route::group(['prefix' => 'patient'], function () {
        Route::group(['as' => 'patient'], function () {
            Route::get('', 'User\UserController@showPatient')->name('.showPatient');
        });
    });

});

