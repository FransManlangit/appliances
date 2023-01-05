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

Route::group(['middleware' => ['auth:sanctum','role:admin']], function () {

    Route::resource('/repair', 'RepairController');
    Route::view('/repair', 'repair.index');
    
    Route::resource('/customer', 'CustomerController');
    Route::view('/customer', 'customer.index');

    Route::resource('/employee', 'EmployeeController');
    Route::view('/employee', 'employee.index');

    Route::resource('/appliance', 'ApplianceController');
    Route::view('/appliance', 'appliance.insert');


    

});

Route::group(['middleware' => ['auth:sanctum','role:customer']], function () {        
    Route::resource('/appliance', 'ApplianceController');    
    Route::get('/appliance-insert', ['uses' => 'ApplianceController@insIndex']);

    Route::get('/consult', 'ConsultationController@index'); // wala pa    

   
});


Route::view('/shop', 'shop.index'); 


Route::get('signin', [
    'uses' => 'LoginController@index',
    'as' => 'user.signin',
]);

Route::view('/signupCustomer', 'user.signupCustomer');
Route::view('/signupEmployee', 'user.signupEmployee');

// Route::view('/signin', 'user.signin');

Route::view('/home', 'home');

// Route::view('/consult', 'consultation.consult');
Route::get('/consult', 'ConsultationController@consult');

Route::get('/appliance-insert', ['uses' => 'ApplianceController@index']);