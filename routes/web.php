<?php

use Illuminate\Support\Facades\Route;
Route::get('/',function(){
return view('backEnd.auth.login');
});
Auth::routes();
Route::group(['as'=>'superadmin.', 'prefix'=>'superadmin', 'namespace'=>'superadmin','middleware'=>[ 'auth', 'superadmin']], function(){
   Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

   Route::get('/companyinfo/add', 'CompanyinfoController@add');
   Route::get('/companyinfo/manage', 'CompanyinfoController@manage');
   Route::post('/companyinfo/save', 'CompanyinfoController@save');
   Route::get('/companyinfo/edit/{id}', 'CompanyinfoController@edit');
   Route::post('/companyinfo/update', 'CompanyinfoController@update');
   Route::post('/companyinfo/inactive','CompanyinfoController@inactive');
   Route::post('/companyinfo/active','CompanyinfoController@active');
   Route::post('/companyinfo/delete','CompanyinfoController@destroy');
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
