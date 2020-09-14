<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
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

Route::get('/' , 'Front\UserController@getIndex');

// Route::get('/landing' , 'Design\IndexDesignController@setIndexPage');

// Route::group(["prefix" => "users" , "namespace" => "Front"],function(){
//     Route::get('/' , function(){
//         return "users";
//     })->name('users');
   
//     Route::get('index', 'UserController@getIndex');

//     Route::get('show' , 'UserController@showUser');
    
//     Route::get('delete' , 'UserController@deleteUser');
    
//     Route::get('get' , 'UserController@getUser');

//     Route::get('update' , 'UserController@updateUser');

//     Route::get('check' , function(){
//         return 'middleware';
//     })->middleware('auth');
// });

// Route::get('login' , function(){
//     return "Log in page";
// })->name('login');

// Route::resource('news' , 'NewsController');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('fillable' , 'CrudController@getOffers');

Route::group(["prefix" => "offers"] , function(){
    // Route::get('store' , 'CrudController@store');
    Route::get('create' , 'CrudController@create');
    Route::post('store' , 'CrudController@store') ->name('offers.store');
});