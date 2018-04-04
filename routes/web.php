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

// Products URL
Route::resource('products','ProductsController');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home','HomeController@userRegistration')->name('home.post');

// Login using microsoft login
Route::middleware(['guest'])->group(function () {
    Route::get('auth/microsoft', 'AuthController@redirectToProvider');
});

// microsoft routes
Route::get('auth/microsoft/callback', 'AuthController@handleProviderCallback');


//localadmin routes
//GET: localadmin login form
Route::get('localadmin/login', 'AdminLoginController@showLoginForm');
//POST: localadmin login form
Route::post('localadmin/login', 'AdminLoginController@login')->name('admin.login.submit');
//localadmin routes to get all users.
Route::get('localadmin/user', 'AdminController@findUser')->name('admin.findUser');
//localadmin dashboard after login.
Route::get('localadmin/dashboard', 'AdminController@index')->name('admin.dashboard');

//admin & Staff routes
//Display available categories
Route::get('admin/categories', 'StaffAdminController@showCategories')->name('adminstaff.categories');

//add categories
Route::post('admin/categories', 'StaffAdminController@addNewCategories')->name('adminstaff.newcategories');

//remove category
Route::delete('admin/categories/delete/{id}', 'StaffAdminController@destroyCategories')->name('adminstaff.deletecategories');


Route::post('getuserlist','AdminLoginController@showuserlist');

Route::post('makeasadmin','AdminLoginController@makeasadmin');

Route::post('removeadmin','AdminLoginController@removeadmin');



Route::get('/testhome',function(){return  view('User Homepage/index'); }); //File::get(public_path() . '/User Homepage/index.html');



Route::get('/testhome1',function(){return  view('User Homepage/index1');  //File::get(public_path() . '/User Homepage/index.html');
});


Route::get('/getCat','GetCatController');

Route::get('/getProd','GetProductController');

Route::get('/getava','GetAvailabilityController');

Route::post('/addtocart','AddToCartController');

Route::get('/YourCart','CartController');

Route::post('/deletefromcart',function (Request $request) {


    DB::table('cart')->where('Cart_Id', '=', $request->input("CartID"))->delete();
});



Route::post('/insert', 'StaffAdminController@collect');
Route::post('/collecting', 'StaffAdminController@return');