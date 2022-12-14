<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


   
});


// Route::middleware('auth:sanctum')->get('/user', function () {
    
// });

Route::get('/customer/all',['uses' => 'CustomerController@getCutomerAll','as' => 'customer.customer'] );

Route::get('/employee/all',['uses' => 'EmployeeController@getEmployeeAll','as' => 'employee.employee'] );

Route::get('/appliance/all',['uses' => 'ApplianceController@getApplianceAll','as' => 'appliance.appliance'] );

Route::resource('customer', 'CustomerController');
Route::resource('employee', 'EmployeeController');
Route::resource('appliance', 'ApplianceController');


// Route::post('/create','CustomerController@store');
// Route::resource('customer', 'CustomerController');
// Route::get('/customer/{id}/delete', 'CustomerController@destroy');
// Route::put('/edit','CustomerController@update');
// Route::get('/customer/{id}/edit', 'CustomerController@edit');
// Route::put('/edit','CustomerController@update');
Route::get('/customer/{id}/edit', 'CustomerController@edit');


Route::put('customer/{id}/update', [CustomerController::class, 'update']);



// Route::view('/customer-index', 'customer.index');


Route::get('/customer/show/{id}',['uses' => 'CustomerController@getCustomer','as' => 'customer.getcustomer'] );

Route::get('/customer/all',['uses' => 'CustomerController@getCustomerAll','as' => 'customer.getcustomerall'] );






