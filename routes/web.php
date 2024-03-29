<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;


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
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register-Submit');

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login-Submit');

Route::get('/forget-password', [ForgotPasswordController::class, 'forgetPasswordForm'])->name('forget-password-form');
Route::post('/submit-forget-password', [ForgotPasswordController::class, 'submitForgetPassword'])->name('submit-forget-password');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPasswordForm'])->name('reset-password-form');
Route::post('/submit-reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('submit-reset-password');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/index',[EmployeeController::class,'index'])->name('index-employees');
    Route::get('/create',[EmployeeController::class,'createEmployee'])->name('create-employee');
    Route::post('/store',[EmployeeController::class,'storeEmployee'])->name('store-employee');
    Route::get('/edit/{id}',[EmployeeController::class,'editEmployee'])->name('edit-employee');
    Route::put('/update/{id}',[EmployeeController::class,'updateEmployee'])->name('update-employee');
    Route::delete('/delete/{id}',[EmployeeController::class,'deleteEmployee'])->name('delete-employee');
    Route::get('/index/pdf',[EmployeeController::class,'generateEmployeePDF'])->name('employees-pdf'); 
    
    Route::get('/home',[PaymentController::class,'homePay'])->name('home-payments');
    Route::get('/home/create',[PaymentController::class,'createPayment'])->name('create-payment');
    Route::post('/home/store',[PaymentController::class,'storePayment'])->name('store-payment');
    Route::get('/home/edit/{id}',[PaymentController::class,'editPayment'])->name('edit-payment');
    Route::put('/home/update/{id}',[PaymentController::class,'updatePayment'])->name('update-payment');
    Route::delete('/home/delete/{id}',[PaymentController::class,'deletePayment'])->name('delete-payment'); 
    Route::get('/home/pdf',[PaymentController::class,'generatePaymentPDF'])->name('payments-pdf');  

    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
});
