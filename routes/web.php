<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models\Site;
//API
use App\Http\Resources\SiteCollection;
Route::get('/sites', function () {
    return new SiteCollection(Site::all());
});
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

// Route::get('/', function () {
    
//     $sites = SITE::paginate(5);
//     return view('site-rental/list',compact('sites'));


//     // return view('welcome');
// });
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\SiteRentalsController::class, 'index'])->name('site-rental.Index');
// Route::get('/', [App\Http\Controllers\SiteRentalsController::class, 'index'])->name('site-rental.Index');
Auth::routes();
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('Logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/site-rental/index', [App\Http\Controllers\SiteRentalsController::class, 'index'])->name('site-rental.Index');
Route::get('/site-rental/create', [App\Http\Controllers\SiteRentalsController::class, 'create'])->name('site-rental.Create');
Route::resource('/site-rental/store', App\Http\Controllers\SiteRentalsController::class);
Route::get('/monthly-payment/create', [App\Http\Controllers\MonthlyPaymentsController::class, 'create'])->name('monthly-payment.Create');
Route::post('/site-rental/update', [App\Http\Controllers\SiteRentalsController::class, 'update'])->name('site-rental.Update');
Route::get('/site-rental/edit/{id}', [App\Http\Controllers\SiteRentalsController::class, 'edit'])->name('site-rental.Edit');
Route::get('/site-rental/view/{id}', [App\Http\Controllers\SiteRentalsController::class, 'view'])->name('site-rental.View');
// Route::get('/site-rental/delete/{id}', [App\Http\Controllers\SiteRentalsController::class, 'destroy'])->name('site-rental.Delete');
Route::get('/site-rental/search', [App\Http\Controllers\SiteRentalsController::class, 'index'])->name('site-rental.Search');
Route::get('/site-rental/delete/{id}', [App\Http\Controllers\SiteRentalsController::class, 'delete'])->name('site-rental.Delete');
//Monthly payment
Route::get('/monthly-payment/create/load', [App\Http\Controllers\MonthlyPaymentsController::class, 'readData'])->name('monthly-payment.load');
Route::resource('/monthly-payment/store', App\Http\Controllers\MonthlyPaymentsController::class);
Route::get('/monthly-payment/search', [App\Http\Controllers\MonthlyPaymentsController::class, 'index'])->name('monthly-payment.Search');
Route::get('/monthly-payment/index', [App\Http\Controllers\MonthlyPaymentsController::class, 'index'])->name('monthly-payment.Index');
Route::get('/monthly-payment/view/{id}', [App\Http\Controllers\MonthlyPaymentsController::class, 'view'])->name('monthly-payment.View');
Route::get('/monthly-payment/edit/{id}', [App\Http\Controllers\MonthlyPaymentsController::class, 'edit'])->name('monthly-payment.Edit');
Route::get('/monthly-payment/delete/{id}', [App\Http\Controllers\MonthlyPaymentsController::class, 'delete'])->name('monthly-payment.Delete');
Route::post('/monthly-payment/update', [App\Http\Controllers\MonthlyPaymentsController::class, 'update'])->name('monthly-payment.Update');

Route::get('/report/index', [App\Http\Controllers\ReportsController::class, 'index'])->name('report.Index');
Route::get('/report/index/exportIntoExcel', [App\Http\Controllers\MonthlyPaymentsController::class, 'exportIntoExcel'])->name('monthly-payment.ExportIntoExcel');
Route::get('/site-rental-payment/index', [App\Http\Controllers\SiteRentalPaymentsController::class, 'index'])->name('site-rental-payment.Index');
Route::get('/site-rental-payment/detail', [App\Http\Controllers\SiteRentalPaymentsController::class, 'detail'])->name('site-rental-payment.Detail');

Route::get('/vendor-list/list', [App\Http\Controllers\VendorsController::class, 'index'])->name('vendor-list.Index');
Route::get('/vendor-list/create', [App\Http\Controllers\VendorsController::class, 'create'])->name('vendor-list.Create');
Route::resource('/vendor-list/store', App\Http\Controllers\VendorsController::class);
Route::post('/vendor-list/update', [App\Http\Controllers\VendorsController::class, 'update'])->name('vendor-list.Update');

Route::get('/site-rental-payment-report/index', [App\Http\Controllers\SiteRentalPaymentReportsController::class, 'index'])->name('site-rental-payment-report.Index');



