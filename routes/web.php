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
Route::get('admin', 'Admin\AdminController@showLoginForm');
Route::post('admin', 'Admin\AdminController@login');

// Admin Dashboard
Route::get('dashboard', 'Admin\DashboardController@index');
