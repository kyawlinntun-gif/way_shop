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

Route::get('/', 'HomeController@index');

// Admin Auth
Route::group(['middleware' => 'guest'], function(){
    Route::get('login', function(){
        return redirect('admin');
    })->name('login');
    Route::get('admin', 'Admin\AdminController@showLoginForm');
    Route::post('admin', 'Admin\AdminController@login');
});

Route::group(['middleware' => 'auth'], function(){
    Route::post('logout', 'Admin\AdminController@logout');
});

Route::group(['middleware' => 'auth'], function(){

    // Admin Dashboard
    Route::get('dashboard', 'Admin\DashboardController@index');

    // Product Route
    Route::resource('product', 'Admin\ProductController');
});


