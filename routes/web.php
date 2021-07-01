<?php

use Illuminate\Support\Facades\Auth;
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
    return view('login');
});
Route::get('/forgot_password', 'App\Http\Controllers\ForgotPasswordController@index');
Route::get('/verify_key', 'App\Http\Controllers\ForgotPasswordController@verifyKey');
Route::get('/reset_password', 'App\Http\Controllers\ForgotPasswordController@loadResetPassword');
Route::post('/change_password', 'App\Http\Controllers\ForgotPasswordController@changePassword');

//STOCKS ROUTE

Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'home']);

Route::get('/', 'App\Http\Controllers\StockController@dashboard');
Route::get('/stock_list','App\Http\Controllers\StockController@index');
Route::get('/add_stock','App\Http\Controllers\StockController@create');
Route::post('/store_stock', 'App\Http\Controllers\StockController@store');
Route::get('product_detail/{id}', 'App\Http\Controllers\StockController@show');
Route::get('edit_stock/{id}', 'App\Http\Controllers\StockController@edit');
Route::post('update_stock/{id}', 'App\Http\Controllers\StockController@update');
Route::get('delete_stock/{id}', 'App\Http\Controllers\StockController@destroy');


//INVOICE ROUTE


Route::get('/invoice_list','App\Http\Controllers\InvoiceController@index');
Route::get('/create_invoice','App\Http\Controllers\InvoiceController@create');
Route::get('show_invoice/{invoice_number}','App\Http\Controllers\InvoiceController@showInvoice');
Route::get('/custom_invoice','App\Http\Controllers\InvoiceController@custom');
Route::get('delete_invoice/{id}', 'App\Http\Controllers\InvoiceController@deleteInvoice');
Route::get('invoice_data_process', 'App\Http\Controllers\InvoiceController@invoiceDataProcess');

// CLIENTS ROUTE


Route::get('/clients_list','App\Http\Controllers\ClientController@index');
Route::get('/add_clients','App\Http\Controllers\ClientController@create');
Route::post('/store_clients','App\Http\Controllers\ClientController@store');
Route::get('client_detail/{id}', 'App\Http\Controllers\ClientController@show');
Route::get('edit_client/{id}','App\Http\Controllers\ClientController@edit');
Route::post('update_client/{id}','App\Http\Controllers\ClientController@update');
Route::get('delete_client/{id}','App\Http\Controllers\ClientController@destroy');


// BACKUP ROUTE


Route::get('backup_data', 'App\Http\Controllers\BackupController@index');
Route::get('download_stocks_data', 'App\Http\Controllers\BackupController@downloadStocksData');
Route::get('download_clients_data', 'App\Http\Controllers\BackupController@downloadClientsData');
Route::get('download_invoice_data', 'App\Http\Controllers\BackupController@downloadInvoiceData');
Route::get('download_invoice_products', 'App\Http\Controllers\BackupController@downloadInvoiceProducts');


//OTHER ROUTE

Route::get('/settings', 'App\Http\Controllers\SettingsController@index');
Route::post('/update_settings', 'App\Http\Controllers\SettingsController@updateSettings');
Route::get('about_software','App\Http\Controllers\PagesController@about');
Route::get('faqs','App\Http\Controllers\PagesController@faqs');
Route::get('/my_account','App\Http\Controllers\InvoiceController@editaccount');
Route::post('/update', 'App\Http\Controllers\InvoiceController@update');

Route::get('logout','App\Http\Controllers\Auth\LoginController@logout');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//API-------------
Route::get('get_stock','App\Http\Controllers\ApiStockController@show' );
