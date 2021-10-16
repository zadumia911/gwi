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
   Route::get('/opening/cash','CompanyinfoController@openingcash');
   Route::post('/cash/edit','CompanyinfoController@cashedit');

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
   Route::get('employee/salary-info','EmployeeController@salaryinfo');

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

   // Admin reports controller
   Route::get('employee-salary/report','ReportsController@empsalaryreport');
   Route::get('bank-statement/report','ReportsController@bankstatement');
   Route::get('expence/report','ReportsController@expencereport');
   Route::get('income/report','ReportsController@incomereport');
   Route::get('/account/cashbook/','ReportsController@cashbook');

  Route::get('customer/collection/add', 'CustomerCollectionController@colladd');
  Route::post('customer/collection/save', 'CustomerCollectionController@collsave');
  Route::get('customer/collection/manage', 'CustomerCollectionController@collmanage');
  Route::get('customer/collection/report', 'CustomerCollectionController@collreport');
  Route::post('customer/collection/active','CustomerCollectionController@collactive');
  Route::post('customer/collection/delete','CustomerCollectionController@colldestroy'); 
  Route::post('customer/collection/report','CustomerCollectionController@collreport'); 


  Route::get('supplier/payment/add', 'SupplierPaymentController@add');
  Route::post('supplier/payment/save', 'SupplierPaymentController@save');
  Route::get('supplier/payment/manage', 'SupplierPaymentController@manage');
  Route::get('supplier/payment/report', 'SupplierPaymentController@report');
  Route::post('supplier/payment/active','SupplierPaymentController@active');
  Route::post('supplier/payment/delete','SupplierPaymentController@destroy'); 
  Route::post('supplier/payment/report','SupplierPaymentController@report'); 

});

Route::group(['as'=>'editor.', 'prefix'=>'editor', 'namespace'=>'editor','middleware'=>['auth', 'editor']], function(){
 Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

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
   Route::get('brand/add', 'BrandController@add');
   Route::get('brand/manage', 'BrandController@manage');
   Route::post('brand/save', 'BrandController@save');
   Route::get('brand/edit/{id}', 'BrandController@edit');
   Route::post('brand/update', 'BrandController@update');
   Route::post('brand/inactive','BrandController@inactive');
   Route::post('brand/active','BrandController@active');
   Route::post('brand/delete','BrandController@destroy'); 

   // Product Controller 
   Route::get('product/add', 'ProductController@add');
   Route::get('product/manage', 'ProductController@manage');
   Route::post('product/save', 'ProductController@save');
   Route::get('product/edit/{id}', 'ProductController@edit');
   Route::post('product/update', 'ProductController@update');
   Route::post('product/inactive','ProductController@inactive');
   Route::post('product/active','ProductController@active');
   Route::post('product/delete','ProductController@destroy');
   Route::get('purchase-product/info','ProductController@pproductinfo');
   Route::get('sale/product-collection','ProductController@saleproductinfo');

   // C & F Controller 
   Route::get('cnf/add', 'CFController@add');
   Route::get('cnf/manage', 'CFController@manage');
   Route::post('cnf/save', 'CFController@save');
   Route::get('cnf/edit/{id}', 'CFController@edit');
   Route::post('cnf/update', 'CFController@update');
   Route::post('cnf/inactive','CFController@inactive');
   Route::post('cnf/active','CFController@active');
   Route::post('cnf/delete','CFController@destroy');

   // Local Cost Head Controller 
   Route::get('localcosthead/add', 'LocalCostHeadController@add');
   Route::get('localcosthead/manage', 'LocalCostHeadController@manage');
   Route::post('localcosthead/save', 'LocalCostHeadController@save');
   Route::get('localcosthead/edit/{id}', 'LocalCostHeadController@edit');
   Route::post('localcosthead/update', 'LocalCostHeadController@update');
   Route::post('localcosthead/inactive','LocalCostHeadController@inactive');
   Route::post('localcosthead/active','LocalCostHeadController@active');
   Route::post('localcosthead/delete','LocalCostHeadController@destroy');
   

   // Local Cost Controller 
   Route::get('localcost/add', 'LocalCostController@add');
   Route::get('localcost/manage', 'LocalCostController@manage');
   Route::get('localcost/report', 'LocalCostController@report');
   Route::post('localcost/save', 'LocalCostController@save');
   Route::post('localcost/delete','LocalCostController@destroy');
   Route::get('lcost-info','LocalCostController@lcost');
   Route::get('purchase/local-cost','LocalCostController@localcost');


   // Import Controller 
   Route::get('import/add', 'ImportController@add');
   Route::get('import/manage', 'ImportController@manage');
   Route::get('import/report', 'ImportController@report');
   Route::get('import/report/{id}', 'ImportController@reportinvoice');
   Route::post('import/save', 'ImportController@save');
   Route::post('import/delete','ImportController@destroy');
   Route::get('purchse/import-info','ImportController@importinfo');


   // Supplier Controller 
   Route::get('supplier/add', 'SupplierController@add');
   Route::get('supplier/manage', 'SupplierController@manage');
   Route::post('supplier/save', 'SupplierController@save');
   Route::get('supplier/edit/{id}', 'SupplierController@edit');
   Route::post('supplier/update', 'SupplierController@update');
   Route::post('supplier/inactive','SupplierController@inactive');
   Route::post('supplier/active','SupplierController@active');
   Route::post('supplier/delete','SupplierController@destroy');
   Route::get('supplier/find','SupplierController@supplierfind');
   Route::get('supplier/payment-info','SupplierController@paymentinfo');
   Route::get('supplier/due-list','SupplierController@duelist');
   Route::get('supplier/history','SupplierController@history');

   // Purchase Controller 
   Route::get('purchase/add', 'PurchaseController@add');
   Route::get('purchase/manage', 'PurchaseController@manage');
   Route::post('purchase/save', 'PurchaseController@save');
   Route::post('purchase/delete','PurchaseController@destroy');
   Route::get('purchase/report','PurchaseController@report');
   Route::get('purchase/report/{id}','PurchaseController@reportinvoice');

   // sale route
   Route::get('sale/add', 'SaleController@add');
   Route::get('sale/manage', 'SaleController@manage');
   Route::post('sale/save', 'SaleController@save');
   Route::post('sale/delete','SaleController@destroy');
   Route::get('sale/report','SaleController@report');
   Route::get('sale/report/{id}','SaleController@reportinvoice');


   // Customer Controller 
   Route::get('customer/add', 'CustomerController@add');
   Route::get('customer/manage', 'CustomerController@manage');
   Route::post('customer/save', 'CustomerController@save');
   Route::get('customer/edit/{id}', 'CustomerController@edit');
   Route::post('customer/update', 'CustomerController@update');
   Route::post('customer/inactive','CustomerController@inactive');
   Route::post('customer/active','CustomerController@active');
   Route::post('customer/delete','CustomerController@destroy');
   Route::get('customer/sale/collection','CustomerController@salecollection');
   Route::get('customer/due-list','CustomerController@duelist');

   // Sale Controller 
   Route::get('sale/add', 'SaleController@add');
   Route::get('sale/manage', 'SaleController@manage');
   Route::post('sale/save', 'SaleController@save');
   Route::get('sale/edit/{id}', 'SaleController@edit');
   Route::post('sale/update', 'SaleController@update');
   Route::post('sale/inactive','SaleController@inactive');
   Route::post('sale/active','SaleController@active');
   Route::post('sale/delete','SaleController@destroy');

   // Customer Collection Controller 
   Route::get('collection/add', 'CustomerCollectionController@add');
   Route::get('collection/manage', 'CustomerCollectionController@manage');
   Route::post('collection/save', 'CustomerCollectionController@save');
   Route::get('collection/edit/{id}', 'CustomerCollectionController@edit');
   Route::post('collection/update', 'CustomerCollectionController@update');
   Route::post('collection/inactive','CustomerCollectionController@inactive');
   Route::post('collection/active','CustomerCollectionController@active');
   Route::post('collection/delete','CustomerCollectionController@destroy');

   // Payment Controller 
   Route::get('payment/add', 'PaymentController@add');
   Route::get('payment/manage', 'PaymentController@manage');
   Route::post('payment/save', 'PaymentController@save');
   Route::get('payment/edit/{id}', 'PaymentController@edit');
   Route::post('payment/update', 'PaymentController@update');
   Route::post('payment/inactive','PaymentController@inactive');
   Route::post('payment/active','PaymentController@active');
   Route::post('payment/delete','PaymentController@destroy');

   // Expense Head Controller 
   Route::get('expensehead/add', 'ExpenseHeadController@add');
   Route::get('expensehead/manage', 'ExpenseHeadController@manage');
   Route::post('expensehead/save', 'ExpenseHeadController@save');
   Route::get('expensehead/edit/{id}', 'ExpenseHeadController@edit');
   Route::post('expensehead/update', 'ExpenseHeadController@update');
   Route::post('expensehead/inactive','ExpenseHeadController@inactive');
   Route::post('expensehead/active','ExpenseHeadController@active');
   Route::post('expensehead/delete','ExpenseHeadController@destroy');

   // Daily Expense Controller 
   Route::get('dailyexpense/add', 'DailyExpenseController@add');
   Route::get('dailyexpense/manage', 'DailyExpenseController@manage');
   Route::post('dailyexpense/save', 'DailyExpenseController@save');
   Route::get('dailyexpense/edit/{id}', 'DailyExpenseController@edit');
   Route::post('dailyexpense/update', 'DailyExpenseController@update');
   Route::post('dailyexpense/inactive','DailyExpenseController@inactive');
   Route::post('dailyexpense/active','DailyExpenseController@active');
   Route::post('dailyexpense/delete','DailyExpenseController@destroy');

   Route::get('stock/report','ReportsController@stock');
   Route::get('stock/ledger','ReportsController@stockledger');
  
});

Route::group(['as'=>'author.', 'prefix'=>'author', 'namespace'=>'author','middleware'=>['auth', 'author']], function(){
 Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Auth::routes();
Route::group(['middleware'=>['auth']], function(){
 Route::get('password/change', 'ChangePassController@index');
 Route::post('password/updated', 'ChangePassController@updated');
});

