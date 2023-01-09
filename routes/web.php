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

Route::group(['middleware' => ['auth:sanctum','role:admin,employee']], function () {

    Route::resource('/repair', 'RepairController');
    Route::view('/repair', 'repair.index');
    
    Route::resource('/customer', 'CustomerController');
    Route::view('/customer', 'customer.index');

    Route::resource('/employee', 'EmployeeController');
    Route::view('/employee', 'employee.index');

    Route::resource('/appliance', 'ApplianceController');
    Route::view('/appliance', 'appliance.index'); 

});

Route::group(['middleware' => ['auth:sanctum','role:customer']], function () {        
   
    Route::get('/appliance-insert', ['uses' => 'ApplianceController@index']);

    Route::get('/consult', 'ConsultationController@index'); 
    Route::resource('/appliance', 'ApplianceController');    
   
    Route::view('/shop', 'shop.index'); 
});

Route::get('signin', [
    'uses' => 'LoginController@index',
    'as' => 'user.signin',
]);

Route::view('/signupCustomer', 'user.signupCustomer');
Route::view('/signupEmployee', 'user.signupEmployee');

// Route::view('/signin', 'user.signin');

Route::view('/home', 'home');
Route::view('/user-profile', 'user.profile');
Route::view('/dashboard','dashboard.index');

// Route::view('/consult', 'consultation.consult');
Route::get('/consult', 'ConsultationController@consult');


Route::get('/dashboard/title-chart',[
    'uses' => 'DashboardController@titleChart',
    'as' => 'dashboard.titleChart'
  ]);
  
  Route::get('/dashboard/SalesChart',[
    'uses' => 'DashboardController@SalesChart',
    'as' => 'dashboard.SalesChart'
  ]);