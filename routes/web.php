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

Auth::routes();

Route::get('/show_restaurants','HomeController@show')->name('front_restaurants');
Route::get('/restaurant/{name}','HomeController@single');

Route::get('/', function () {

    return view('homepage.mainpage');

})->name('home');

Route::get('/about', 'AboutController@index');

Route::get('/checkout_payment','CheckoutController@index');
Route::post('/checkout','CheckoutController@checkout');

//Admin Backend
Route::middleware(['isadmin'])->group(function () {

    Route::prefix('admin')->group(function () {
        
        //Admin Dashboard
        Route::get('/', 'AdminController@index')->name('admin');

        //Admin Locations
        Route::get('locations','LocationsController@index')->name('locations');
        Route::get('location/{state}','LocationsController@edit');

        //Admin Restuarants View
        Route::get('restaurants','RestaurantsController@index')->name('restaurants');
        //Route::get('restaurants/add', 'RestaurantsController@create')->name('add_restaurant');
        //Route::post('restaurants', 'RestaurantsController@store');
        Route::get('restaurant/{id}', 'RestaurantsController@show')->name('single_restaurant');
        Route::get('restaurant/edit/{res_id}','RestaurantsController@admin_edit')->name('admin_edit_restaurant');
        Route::patch('restaurant/edit/{res_id}','RestaurantsController@admin_update');

        //Admin Food Listing
        Route::get('food_list', 'FoodListsController@index')->name('admin_foodlist');
        //Route::get('food_list/add', 'FoodListsController@create')->name('add_foodlist');
        //Route::post('food_list/add_list', 'FoodListsController@store');
        Route::get('restaurant/{res_id}/food_list/{id}', 'FoodListsController@admin_edit');
        Route::patch('restaurant/{res_id}/food_list/{id}', 'FoodListsController@admin_update');

        //Admin Food Categories View
        Route::get('food_categories', 'FoodCategoriesController@index')->name('admin_foodcategories');
        //Route::get('food_categories/add', 'FoodCategoriesController@create')->name('add_foodcategories');
        //Route::post('food_categories/add_category','FoodCategoriesController@store');

        //Admin Vendors View
        Route::get('vendors','VendorController@index')->name('vendors');
        Route::get('vendor/restaurant/{id}','VendorController@show');
        Route::get('makevendor/{id}','VendorController@store');

        //Admin Registered Users
        Route::get('users', 'UsersController@index')->name('users');
        Route::get('user/{id}','UsersController@edit')->name('user');
        Route::patch('user/{id}','UsersController@update');

    });  

});

Route::middleware(['isvendor'])->group(function () {

    Route::prefix('vendor')->group(function () {

        //Vendor Dashboard
        Route::get('/', 'VendorController@owner')->name('main');

        //Vendor Restuarants View
        Route::get('restaurant','RestaurantsController@restaurant')->name('restaurant');
        Route::get('restaurant/edit','RestaurantsController@edit')->name('edit_restaurant');
        Route::patch('restaurant/{id}','RestaurantsController@update');
        Route::post('restaurant/cities','LocationsController@getCities');

        //Vendor Menu View
        Route::get('menu','MenuController@index')->name('menu');
        Route::get('add_menu','MenuController@show')->name('add_menu');
        Route::post('add_menu_category','MenuController@store');
        Route::post('menu_sort/sort', 'MenuController@sort');

        //Vendor Food Categories View
        Route::get('food_categories', 'FoodCategoriesController@index')->name('foodcategories');
        Route::get('food_categories/add', 'FoodCategoriesController@create')->name('add_foodcategories');
        Route::post('food_categories/add_category','FoodCategoriesController@store');

        //Vendor Food Listing
        Route::get('food_list', 'FoodListsController@singlelist')->name('foodlist');
        Route::get('food_list/add', 'FoodListsController@create')->name('add_foodlist');
        Route::post('food_list/add_list/{id}', 'FoodListsController@store');
        Route::get('food_list/{id}', 'FoodListsController@edit');
        Route::patch('food_list/{id}', 'FoodListsController@update');
        Route::post('food_list/sort', 'FoodListsController@sort');

    });

});