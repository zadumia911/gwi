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

    // Employee payment 
   Route::get('employee-payment/add', 'EmployeepaymentController@add');
   Route::get('employee-payment/manage', 'EmployeepaymentController@manage');
   Route::post('employee-payment/save', 'EmployeepaymentController@save');
   Route::get('employee-payment/edit/{id}', 'EmployeepaymentController@edit');
   Route::post('employee-payment/update', 'EmployeepaymentController@update');
   Route::post('employee-payment/inactive','EmployeepaymentController@inactive');
   Route::post('employee-payment/active','EmployeepaymentController@active');
   Route::post('employee-payment/delete','EmployeepaymentController@destroy');

   // Bank Controller
   Route::get('bank/add', 'BankController@add');
   Route::get('bank/manage', 'BankController@manage');
   Route::post('bank/save', 'BankController@save');
   Route::get('bank/edit/{id}', 'BankController@edit');
   Route::post('bank/update', 'BankController@update');
   Route::post('bank/inactive','BankController@inactive');
   Route::post('bank/active','BankController@active');
   Route::post('bank/delete','BankController@destroy');  

   // Withdraw Controller 
   Route::get('withdraw/add', 'WithdrawController@add');
   Route::get('withdraw/manage', 'WithdrawController@manage');
   Route::post('withdraw/save', 'WithdrawController@save');
   Route::get('withdraw/edit/{id}', 'WithdrawController@edit');
   Route::post('withdraw/update', 'WithdrawController@update');
   Route::post('withdraw/inactive','WithdrawController@inactive');
   Route::post('withdraw/active','WithdrawController@active');
   Route::post('withdraw/delete','WithdrawController@destroy'); 

   // Deposit Controller 
   Route::get('deposit/add', 'DepositController@add');
   Route::get('deposit/manage', 'DepositController@manage');
   Route::post('deposit/save', 'DepositController@save');
   Route::get('deposit/edit/{id}', 'DepositController@edit');
   Route::post('deposit/update', 'DepositController@update');
   Route::post('deposit/inactive','DepositController@inactive');
   Route::post('deposit/active','DepositController@active');
   Route::post('deposit/delete','DepositController@destroy');  

    // Category Controller
   Route::get('category/add', 'CategoryController@add');
   Route::get('category/manage', 'CategoryController@manage');
   Route::post('category/save', 'CategoryController@save');
   Route::get('category/edit/{id}', 'CategoryController@edit');
   Route::post('category/update', 'CategoryController@update');
   Route::post('category/inactive','CategoryController@inactive');
   Route::post('category/active','CategoryController@active');
   Route::post('category/delete','CategoryController@destroy');  

   // Brand Controller 
   Route::get('brand/add', 'WithdrawController@add');
   Route::get('brand/manage', 'WithdrawController@manage');
   Route::post('brand/save', 'WithdrawController@save');
   Route::get('brand/edit/{id}', 'WithdrawController@edit');
   Route::post('brand/update', 'WithdrawController@update');
   Route::post('brand/inactive','WithdrawController@inactive');
   Route::post('brand/active','WithdrawController@active');
   Route::post('brand/delete','WithdrawController@destroy'); 

   // Item Controller 
   Route::get('item/add', 'DepositController@add');
   Route::get('item/manage', 'DepositController@manage');
   Route::post('item/save', 'DepositController@save');
   Route::get('item/edit/{id}', 'DepositController@edit');
   Route::post('item/update', 'DepositController@update');
   Route::post('item/inactive','DepositController@inactive');
   Route::post('item/active','DepositController@active');
   Route::post('item/delete','DepositController@destroy');  

   // Admin reports controller
   Route::get('employee-salary/report','ReportsController@empsalaryreport');

});

Route::group(['as'=>'editor.', 'prefix'=>'editor', 'namespace'=>'editor','middleware'=>['auth', 'editor']], function(){
 Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['as'=>'author.', 'prefix'=>'author', 'namespace'=>'author','middleware'=>['auth', 'author']], function(){
 Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
