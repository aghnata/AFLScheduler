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

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/admin', function () {
//         return view('dashboard');
//     });
//     Route::resource('/jadwal_AFLers', 'PenjadwalanController');
//     Route::get('/Schedule/All', 'ScheduleController@All');
//     Route::post('/Schedule/SortingSchedule', 'ScheduleController@SortingSchedule');
//     Route::post('/Schedule/ChangePaymentStatus', 'ScheduleController@ChangePaymentStatus');
//     Route::post('/Schedule/Store', 'ScheduleController@Store');
//     Route::post('/Schedule/Delete', 'ScheduleController@Delete');


// });

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('welcome');
});

// Route::get('/tampilan', function () {
//     return view('tampilan');
// });

// Route::resource('/afl2', 'AFLController');
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/verify/{token}/{id}', 'Auth\RegisterController@verify_register');
// Route::get('/listaflee', 'AfleeController@ShowAflerByAflee');
// Route::get('/listafler', 'AflerController@ShowAfleeByAfler');
