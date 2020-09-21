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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('ambassadors','AmbassadorController');
Route::apiResource('guarantors', 'GuarantorController');
Route::apiResource('clients', 'ClientController');
Route::apiResource('salaries', 'SalaryController');
Route::apiResource('employees', 'EmployeeController');
Route::apiResource('loans', 'LoanController');



Route::group([
    'middleware' => 'api',
], function ($router) {

    Route::post('register', 'JWTAuthController@register');
    Route::post('login', 'JWTAuthController@login');
    Route::post('logout', 'JWTAuthController@logout');
    Route::post('refresh', 'JWTAuthController@refresh');
    Route::get('profile', 'JWTAuthController@profile');

});