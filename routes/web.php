<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::group(['as'=>'superadmin.', 'prefix'=>'superadmin', 'namespace'=>'superadmin','middleware'=>[ 'auth', 'superadmin']], function(){
 Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'admin','middleware'=>['auth', 'admin']], function(){
 Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['as'=>'editor.', 'prefix'=>'editor', 'namespace'=>'editor','middleware'=>['auth', 'editor']], function(){
 Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['as'=>'author.', 'prefix'=>'author', 'namespace'=>'author','middleware'=>['auth', 'author']], function(){
 Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

