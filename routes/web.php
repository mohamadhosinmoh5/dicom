<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dicom', function () {
    return view('dicom');
});

// Route::get('/', function () {
//     return view('master');
// });

// Route::get('/dicom-viewer', function () {
//     return view('master');
// });

// Route::get('/settings', function () {
//     return view('master');
// });


Route::get('{any}', function(){
    return view('master');
})
    ->where('any', '.*');
// Route::get('/login', function () {
//     return view('login');
// });

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
