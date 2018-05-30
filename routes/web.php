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
Route::post('/restaurant_by_place','HomeController@restaurants_place');
Route::get('/restaurants_{location_link}','HomeController@restaurants_by_link');
Route::get('/restaurant/{name}','HomeController@single');

Route::get('/', 'HomeController@index')->name('home');

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
        Route::post('location/{state}/add_city','LocationsController@add_city');
        Route::post('location/city/is_available', 'CityController@availability');
        Route::get('location/delete/city/{city_id}','CityController@destroy');

        //Admin Restuarants View
        Route::get('restaurants','RestaurantsController@index')->name('restaurants');
        //Route::get('restaurants/add', 'RestaurantsController@create')->name('add_restaurant');
        //Route::post('restaurants', 'RestaurantsController@store');
        Route::get('restaurant/{id}', 'RestaurantsController@show')->name('single_restaurant');
        Route::get('restaurant/edit/{res_id}','RestaurantsController@admin_edit')->name('admin_edit_restaurant');
        Route::patch('restaurant/edit/{res_id}','RestaurantsController@admin_update');
        Route::post('restaurant/edit/cities','LocationsController@getCities');

        //Admin Food Listing
        Route::get('food_list', 'FoodListsController@index')->name('admin_foodlist');
        Route::get('restaurant/{res_id}/food_list/add', 'FoodListsController@admin_create_dish')->name('admin_add_dish');
        Route::post('restaurant/{res_id}/food_list/add_list', 'FoodListsController@admin_store_dish')->name('admin_add_new_dish');
        Route::get('restaurant/{res_id}/food_list/{id}', 'FoodListsController@admin_edit');
        Route::patch('restaurant/{res_id}/food_list/{id}', 'FoodListsController@admin_update');
        Route::post('food_list/is_available', 'FoodListsController@availability');

        //Admin Food Categories View
        Route::get('food_categories', 'FoodCategoriesController@index')->name('admin_foodcategories');
        //Route::get('food_categories/add', 'FoodCategoriesController@create')->name('add_foodcategories');
        //Route::post('food_categories/add_category','FoodCategoriesController@store');

        //Admin Vendors View
        Route::get('vendors','VendorController@index')->name('vendors');
        Route::get('vendor/restaurant/{id}','VendorController@show');
        Route::get('add_vendor','VendorController@admin_vendor_creation')->name('admin_add_vendor');
        Route::post('makevendor','VendorController@store');

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
        Route::get('menu','MenuController@index')->name('sort_menu');
        Route::get('add_menu','MenuController@show')->name('add_menu');
        //Route::post('add_menu_category','MenuController@store');
        Route::post('menu_sort/sort', 'MenuController@sort');

        //Vendor Food Categories View
        Route::get('food_categories', 'FoodCategoriesController@index')->name('foodcategories');
        Route::get('food_categories/add', 'FoodCategoriesController@create')->name('add_foodcategories');
        Route::post('{res_id}/food_categories/add_category','FoodCategoriesController@store');
        Route::post('food_categories/is_available', 'FoodCategoriesController@availability');

        //Vendor Food Listing
        Route::get('food_list', 'FoodListsController@singlelist')->name('foodlist');
        Route::get('food_list/add', 'FoodListsController@create')->name('add_foodlist');
        Route::post('food_list/add_list/{id}', 'FoodListsController@store')->name('add_new_dish');
        Route::get('food_list/{id}', 'FoodListsController@edit');
        Route::patch('food_list/{id}', 'FoodListsController@update');
        Route::post('food_list/sort', 'FoodListsController@sort');
        Route::post('food_list/is_available', 'FoodListsController@availability');

    });

});