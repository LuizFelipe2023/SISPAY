<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/',[EmployeeController::class,'index'])->name('index-employees');
Route::get('/create',[EmployeeController::class,'createEmployee'])->name('create-employee');
Route::post('/store',[EmployeeController::class,'storeEmployee'])->name('store-employee');
Route::get('/edit/{id}',[EmployeeController::class,'editEmployee'])->name('edit-employee');
Route::put('/update/{id}',[EmployeeController::class,'updateEmployee'])->name('update-employee');
Route::delete('/delete/{id}',[EmployeeController::class,'deleteEmployee'])->name('delete-employee');

Route::get('/home',[PaymentController::class,'homePay'])->name('home-payments');
Route::get('/home/create',[PaymentController::class,'createPayment'])->name('create-payment');
Route::post('/home/store',[PaymentController::class,'storePayment'])->name('store-payment');
Route::get('/home/edit/{id}',[PaymentController::class,'editPayment'])->name('edit-payment');
Route::put('/home/update/{id}',[PaymentController::class,'updatePayment'])->name('update-payment');
Route::delete('/home/delete/{id}',[PaymentController::class,'deletePayment'])->name('delete-payment');