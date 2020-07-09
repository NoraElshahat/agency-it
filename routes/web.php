<?php

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

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    return view('user');
})->middleware('user');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('admin')->name('home');
Route::resource('ticket','TicketController')->middleware('admin');
Route::get('/sort','TicketController@sort')->middleware('admin')->name('ticket.sort');
Route::get('users','HomeController@users')->middleware('admin')->name('users');
Route::get('admin/{id}','HomeController@makeAdmin')->middleware('admin')->name('makeAdmin');