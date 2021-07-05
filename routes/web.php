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
    return view('frontend.index');
});
Route::get('/contact-us', function () {
    return view('frontend.contact-us');
});
Route::get('/buy-phone', function () {
    return view('frontend.buy-phone');
});
Route::get('/buy-accessories', function () {
    return view('frontend.buy-accessories');
});
Route::get('/repair', function () {
    return view('frontend.repair');
});
Route::get('/repair-step', function () {
    return view('frontend.repair-steps');
});
Route::get('/single', function () {
    return view('frontend.single');
});
Route::get('/pay-bills', function () {
    return view('frontend.pay-bills');
});
Route::get('/signup', function () {
    return view('frontend.signup');
});
Route::get('/signin', function () {
    return view('frontend.signin');
});
Route::get('/profile', function () {
    return view('frontend.profile');
});

Route::group(['prefix' => 'technician'], function () {
    Route::get('/', function(){
        return view('frontend.technician.index');
    });
    Route::get('/login', function(){
        return view('frontend.technician.login-page');
    });

    Route::get('/orders', function(){
        return view('frontend.technician.orders');
    });
});