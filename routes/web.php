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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes( ['verify'=>true] );


Route::group([ 'as'=>'admin.','prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['web','auth','admin','verified'] ],
    function()
    {
        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::get('addbooks','DashboardController@addbooks')->name('addbooks');
        Route::post('storebooks','DashboardController@storebooks')->name('storebooks');
        Route::get('showbooks','DashboardController@showbooks')->name('showbooks');
        Route::get('editbook/{id}','DashboardController@editbook')->name('editbook');
        Route::put('updatebook/{id}','DashboardController@updatebook')->name('updatebook');
        Route::delete('deletebook/{id}','DashboardController@deletebook')->name('deletebook');
        Route::get('showlibrarians', 'DashboardController@showlibrarians')->name('showlibrarians');
        Route::get('editlibrarians/{id}', 'DashboardController@editlibrarian')->name('editlibrarian');
        Route::put('updatelibrarian/{id}', 'DashboardController@updatelibrarian')->name('updatelibrarian');
        Route::delete('deletelibrarian/{id}', 'DashboardController@deletelibrarian')->name('deletelibrarian');
        Route::get('profile/{id}', 'DashboardController@profile')->name('profile');
    }
);
Route::group([ 'as'=>'librarian.','prefix'=>'librarian', 'namespace'=>'Librarian', 'middleware'=>['auth','librarian','verified'] ],
    function()
    {
        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::get('search', 'DashboardController@search')->name('search');
        Route::get('profile/{id}', 'DashboardController@profile')->name('profile');
        Route::get('editprofile/{id}','DashboardController@editprofile')->name('editprofile');
        Route::put('updateprofile/{id}','DashboardController@updateprofile')->name('updateprofile');
        Route::get('listbooks','DashboardController@listbooks')->name('listbooks');
        Route::get('bookdetails/{id}','DashboardController@bookdetails')->name('bookdetails');
    }
);