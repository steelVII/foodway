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
        Route::get('/restaurants','RestaurantsController@index')->name('restaurants');
        Route::get('restaurants/add', 'RestaurantsController@add')->name('add_restaurant');
        Route::get('/restaurants/{id}',function($id) {

            return view('backend.Restaurants.restaurants',[

                'id' => $id

            ]);

        });

        //Admin Food Categories View
        Route::get('food_categories', 'FoodCategoriesController@index')->name('foodcategories');

        //Admin Registered Users
        Route::get('users', 'UsersController@index')->name('users');

    });  

});