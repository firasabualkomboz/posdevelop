<?php
use Illuminate\Support\Facades\Route;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],

    function(){ //...

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function(){

            // Route::get('/check', function () {

            //     return view('dashboard.welcome');

            // });

//            Route::get('/index', 'DashboardController@index')->name('index');
            Route::get('/', 'WelcomeController@index')->name('welcome');
            // users routes

            Route::resource('users', 'UserController')->except(['show']);

            //product routes
            Route::resource('products', 'ProductController')->except(['show']);

            //client routes
            Route::resource('clients', 'ClientController')->except(['show']);
            Route::resource('clients.orders', 'Client\OrderController')->except(['show']);

//            order routs
            Route::resource('orders', 'OrderController');
            Route::get('/orders/{order}/products', 'OrderController@products')->name('orders.products');


            // users category
            Route::resource('categories', 'CategoryController')->except(['show']);


        });
        // end the route



    });




