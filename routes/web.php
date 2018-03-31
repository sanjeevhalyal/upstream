<?php

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

Route::get('/', 'TestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home','HomeController@userRegistration')->name('home.post');

// Login using microsoft login
Route::middleware(['guest'])->group(function () {
    Route::get('auth/microsoft', 'AuthController@redirectToProvider');
});

// microsoft routes
Route::get('auth/microsoft/callback', 'AuthController@handleProviderCallback');


//admin routes
//GET: admin login form
Route::get('admin/login', 'AdminLoginController@showLoginForm');
//POST: admin login form
Route::post('admin/login', 'AdminLoginController@login')->name('admin.login.submit');
//POST: Logout
Route::get('admin/logout', 'AdminLoginController@logout')->name('admin.logout');


//admin dashboard after login.
Route::get('admin/dashboard', 'AdminController@index')->name('admin.dashboard');

//admin routes to get all users.
Route::get('admin/user', 'AdminController@findUser')->name('admin.findUser');



// Products URL
Route::resource('products','ProductsController');
