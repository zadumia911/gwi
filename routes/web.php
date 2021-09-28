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

   // EmployeeController
   Route::get('employee/add', 'EmployeeController@add');
   Route::get('employee/manage', 'EmployeeController@manage');
   Route::post('employee/save', 'EmployeeController@save');
   Route::get('employee/edit/{id}', 'EmployeeController@edit');
   Route::post('employee/update', 'EmployeeController@update');
   Route::post('employee/inactive','EmployeeController@inactive');
   Route::post('employee/active','EmployeeController@active');
   Route::post('employee/delete','EmployeeController@destroy');

   // SalaryheadController
   Route::get('salaryhead/add', 'SalaryheadController@add');
   Route::get('salaryhead/manage', 'SalaryheadController@manage');
   Route::post('salaryhead/save', 'SalaryheadController@save');
   Route::get('salaryhead/edit/{id}', 'SalaryheadController@edit');
   Route::post('salaryhead/update', 'SalaryheadController@update');
   Route::post('salaryhead/inactive','SalaryheadController@inactive');
   Route::post('salaryhead/active','SalaryheadController@active');
   Route::post('salaryhead/delete','SalaryheadController@destroy');

   // SalaryController
   Route::get('salary/add', 'SalaryController@add');
   Route::get('salary/manage', 'SalaryController@manage');
   Route::post('salary/save', 'SalaryController@save');
   Route::get('salary/edit/{id}', 'SalaryController@edit');
   Route::post('salary/update', 'SalaryController@update');
   Route::post('salary/inactive','SalaryController@inactive');
   Route::post('salary/active','SalaryController@active');
   Route::post('salary/delete','SalaryController@destroy');
});

Route::group(['as'=>'editor.', 'prefix'=>'editor', 'namespace'=>'editor','middleware'=>['auth', 'editor']], function(){
 Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['as'=>'author.', 'prefix'=>'author', 'namespace'=>'author','middleware'=>['auth', 'author']], function(){
 Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
