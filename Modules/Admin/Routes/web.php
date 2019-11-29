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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
    // slideshow route
    Route::resource('slide', 'SlideShowController')
        ->except(['show','destroy']);
    Route::get('slide/delete/{id}', 'SlideShowController@delete')
        ->name('slide.delete');
    Route::get('logout', 'AuthenticateController@logout');
    Route::post('login', 'AuthenticateController@login');
    // about route
    Route::get('about', 'AboutController@index');
    Route::get('about/edit/{id}', 'AboutController@edit');
    Route::post('about/update', 'AboutController@update');
    // file manager
    Route::view('fileman', 'admin::fileman');

     //Service
     Route::resource('service', 'ServiceController');
     Route::get('service/delete/{id}', 'ServiceController@delete');

     //Teams
     Route::resource('team', 'TeamController');
     Route::get('team/delete/{id}', 'TeamController@delete')->name('team.delete');
























     //News
     Route::resource('news', 'NewsController');
     Route::get('news/delete/{id}', 'NewsController@delete')->name('news.delete');




























     
    //Category
    Route::resource('category', 'CategoryController');
    Route::get('category/delete/{id}', 'CategoryController@delete')->name('category.delete');

     //Portfolios
     Route::resource('portfolios', 'PortfoliosController');
     Route::get('portfolios/delete/{id}', 'PortfoliosController@delete')->name('portfolios.delete');
});
