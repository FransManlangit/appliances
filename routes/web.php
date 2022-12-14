<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');

   
});


Route::resource('/repair', 'RepairController');
Route::view('/repair', 'repair.index');

Route::resource('/customer', 'CustomerController');
Route::view('/customer', 'customer.index');

Route::resource('/employee', 'EmployeeController');
Route::view('/employee', 'employee.index');

Route::resource('/appliance', 'ApplianceController');
Route::view('/appliance', 'appliance.index');

Route::view('/signupCustomer', 'user.signupCustomer');
Route::view('/signupEmployee', 'user.signupEmployee');

Route::view('/signin', 'user.signin');

Route::view('/home', 'home');


Route::view('/shop', 'shop.index');