<?php

use App\Http\Controllers\LoginController;
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

Route::POST('/post/login', [LoginController::class,'login']);

Route::get('/dicom', function () {
    return view('dicom');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


// Route::get('{any}', function(){
//     return view('master');
// })
//     ->where('any', '.*');
// Route::get('/login', function () {
//     return view('login');
// });

