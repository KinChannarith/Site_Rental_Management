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
Route::resource('/monthly-payment/monthlyPayments', 'App\Http\Controllers\MonthlyPaymentsApiController');
Route::resource('/monthly-payment/monthlyPaymentVouchers', 'App\Http\Controllers\MonthlyPaymentVouchersApiController');

Route::get('/sites', [App\Http\Controllers\SiteRentalPaymentsApiController::class, 'site']);

Route::get('/vendors', [App\Http\Controllers\VendorsApiController::class, 'vendor']);
Route::get('/status', [App\Http\Controllers\SiteRentalPaymentsApiController::class, 'status']);
Route::get('/siteOwner', [App\Http\Controllers\MonthlyPaymentsApiController::class, 'siteOwner']);
Route::get('/monthlyPayments', [App\Http\Controllers\MonthlyPaymentsApiController::class, 'monthlyPayment']);

Route::get('/getMonthlyPayments', [App\Http\Controllers\MonthlyPaymentsApiController::class, 'getMonthlyPayment']);
Route::get('/getMonthlyPaymentReport', [App\Http\Controllers\MonthlyPaymentsApiController::class, 'getMonthlyPaymentReport']);

Route::resource('vendor-list/vendors', 'App\Http\Controllers\VendorsApiController');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Api
Route::get('/site-rental-payment/all',[App\Http\Controllers\SiteRentalPaymentsController::class, 'allSites']);
// Create new article





