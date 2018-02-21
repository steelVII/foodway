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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {

    return view('homepage.mainpage');

});

Route::get('/about', 'AboutController@index');

//Admin Backend
Route::middleware(['isadmin'])->group(function () {

    Route::prefix('admin')->group(function () {
        
        //Admin Dashboard
        Route::get('/', 'AdminController@index')->name('admin');

        //Admin Restuarants View
        Route::get('restaurants','RestaurantsController@index')->name('restaurants');
        Route::get('restaurants/add', 'RestaurantsController@create')->name('add_restaurant');
        Route::post('restaurants', 'RestaurantsController@store');

        //Admin Food Listings
        Route::get('food_list', 'FoodListsController@index')->name('foodlist');
        Route::get('food_list/add', 'FoodListsController@create')->name('add_foodlist');
        Route::post('food_list/add_list', 'FoodListsController@store');

        //Admin Food Categories View
        Route::get('food_categories', 'FoodCategoriesController@index')->name('foodcategories');
        Route::get('food_categories/add', 'FoodCategoriesController@create')->name('add_foodcategories');
        Route::post('food_categories/add_category','FoodCategoriesController@store');

        //Admin Registered Users
        Route::get('users', 'UsersController@index')->name('users');
        Route::get('user/{id}','UsersController@edit')->name('user');
        Route::patch('user/{id}','UsersController@update');

    });  

});