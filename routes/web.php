<?php

use Illuminate\Support\Facades\Route;
Route::get('/',function(){
return view('backEnd.auth.login');
});
Auth::routes();
Route::group(['as'=>'superadmin.', 'prefix'=>'superadmin', 'namespace'=>'superadmin','middleware'=>[ 'auth', 'superadmin']], function(){
   Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

   //Company info 
   Route::get('/companyinfo/add', 'CompanyinfoController@add');
   Route::get('/companyinfo/manage', 'CompanyinfoController@manage');
   Route::post('/companyinfo/save', 'CompanyinfoController@save');
   Route::get('/companyinfo/edit/{id}', 'CompanyinfoController@edit');
   Route::post('/companyinfo/update', 'CompanyinfoController@update');
   Route::post('/companyinfo/inactive','CompanyinfoController@inactive');
   Route::post('/companyinfo/active','CompanyinfoController@active');
   Route::post('/companyinfo/delete','CompanyinfoController@destroy');

   // User
    Route::get('/user/add', 'UserController@add');
    Route::post('/user/save', 'UserController@save');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::post('/user/update', 'UserController@update');
    Route::get('/user/manage', 'UserController@manage');
    Route::post('/user/inactive', 'UserController@inactive');
    Route::post('/user/active', 'UserController@active');
    Route::post('/user/delete', 'UserController@destroy');
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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
