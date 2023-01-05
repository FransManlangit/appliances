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

Route::group(['middleware' => ['auth:sanctum']], function () {

Route::get('/repair/all',['uses' => 'RepairController@getRepairAll','as' => 'repair.repair'] );
Route::resource('repair', 'RepairController');

Route::get('/customer/all',['uses' => 'CustomerController@getCustomerAll','as' => 'customer.customer'] );
Route::resource('customer', 'CustomerController');


Route::get('/employee/all',['uses' => 'EmployeeController@getEmployeeAll','as' => 'employee.employee'] );
Route::resource('employee', 'EmployeeController');

Route::get('/appliance/all',['uses' => 'ApplianceController@getApplianceAll','as' => 'appliance.appliance'] );
Route::resource('appliance', 'ApplianceController');



// Customer

// Route::put('customer/{id}/update', [CustomerController::class, 'update']);
Route::get('/customer/{id}/edit', 'CustomerController@edit');

Route::post('/customer/update/{id}',['uses' => 'CustomerController@update','as' => 'customer.update']);

Route::get('/restore/customer/{id}',['uses' => 'CustomerController@restore','as' => 'customer.restore']);

// Route::get('/customer/show/{id}',['uses' => 'CustomerController@getCustomer','as' => 'customer.getcustomer'] );

// Route::get('/customer/all',['uses' => 'CustomerController@getCustomerAll','as' => 'customer.getcustomerall'] );


// Employee

Route::get('/employee/{id}/edit', 'EmployeeController@edit');

Route::post('/employee/update/{id}',['uses' => 'EmployeeController@update','as' => 'employee.update']);

Route::get('/restore/employee/{id}',['uses' => 'EmployeeController@restore','as' => 'employee.restore']);


// Appliance

Route::get('/applaince/{id}/edit', 'ApplianceController@edit');

Route::post('/appliance/update/{id}',['uses' => 'ApplianceController@update','as' => 'appliance.update']);


Route::get('/restore/appliance/{id}',['uses' => 'ApplianceController@restore','as' => 'appliance.restore']);


// Repair

Route::get('/repair/{id}/edit', 'RepairController@edit');

Route::post('/repair/update/{id}',['uses' => 'RepairController@update','as' => 'repair.update']);

Route::get('/restore/repair/{id}',['uses' => 'RepairController@restore','as' => 'repair.restore']);

});


Route::get('/getRepairs', [
  'uses' => 'RepairController@getRepair',
  'as' => 'getRepairs'
  ]);

Route::group(['middleware' => 'guest'], function() {
    Route::resource('customer', 'CustomerController')->only(['store']);
    Route::resource('employee', 'EmployeeController')->only(['store']);
  });

  Route::post('signin', [
    'uses' => 'LoginController@postSignin',
    'as' => 'user.signin',
]);

Route::get('logout',[
  'uses' => 'LoginController@logout',
  'as' => 'login.logout',
]);

Route::post('/repair/checkout',[
  'uses' => 'RepairController@postCheckout',
  'as' => 'checkout'
]);

// Route::middleware('auth:sanctum')->get('/user', function () {
    
// });

// Route::post('/create','CustomerController@store');
// Route::resource('customer', 'CustomerController');
// Route::get('/customer/{id}/delete', 'CustomerController@destroy');
// Route::put('/edit','CustomerController@update');
// Route::get('/customer/{id}/edit', 'CustomerController@edit');
// Route::put('/edit','CustomerController@update');

// Route::view('/customer-index', 'customer.index');

// Route::view('/repair', 'repair.index');

// Route::post('/repair/checkout',[
//     'uses' => 'RpeairController@postCheckout',
//     'as' => 'checkout'
// ]);








