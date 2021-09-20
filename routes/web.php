<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', 'EmployeeController@index')->name('home');
Route::get('/employee/create', 'EmployeeController@create')->name('employee.create');
Route::get('/employee/import', 'EmployeeController@import')->name('employee.import');
Route::get('/employee/list', 'EmployeeController@list')->name('employee.list');
Route::get('/payroll/import', 'PayrollController@import')->name('payroll.import');
Route::get('/payroll/viewuploaded', 'PayrollController@listPayrolls')->name('payrolls.view');
Route::get('/payroll/{id}/viewSlips','PayrollController@listPayslips')->name('payroll.slips');
Route::get('/payroll/{id}/pluckpayslip','PayrollController@viewEmployeePayslip')->name('payroll.slip');
Route::get('/employee/{id}/edit','EmployeeController@edit')->name('employee.edit');
Route::put('/employee/{id}/update','EmployeeController@update')->name('employee.update');
Route::delete('employee/delete', 'EmployeeController@destroy')->name('employee.destroy');
Route::delete('payroll/{month}/delete','PayrollController@destroy')->name('payroll.destroy');
Route::get('/user/changepassword','HomeController@changePassword')->name('user.changepass');

//Store to database routes
Route::post('employee/store', 'EmployeeController@store')->name('employee.store');
Route::post('employee/upload', 'EmployeeController@upload')->name('employee.upload');
Route::post('payroll/upload','PayrollController@upload')->name('payroll.upload');
Route::post('user/update','homeController@updatePassword')->name('user.updatepass');
//Update Password

// API Accessors
Route::get('/api/employees','ApiController@getAllEmployees')->name('employees.datatables');
Route::get('/api/{id}/payslips','ApiController@getMonthlyPayslips')->name('payslips.datatables');

//Emails Sending
Route::get('/payroll/{month}/sendEmail','PayrollController@emailSlips')->name('payroll.email');

// Routes to download templates
Route::get('/template/download/{name}','HomeController@downloadTemplate')->name('download.template');


Auth::routes();


