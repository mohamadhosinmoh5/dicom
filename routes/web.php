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

// Route::get('/', function () {
//     return view('master');
// });


Route::POST('/login', [LoginController::class,'login']);
Route::POST('/dicomFile',[dicomController::class,'dicomFile']);
Route::middleware('auth')->get('/dicom',[dicomController::class,'showDicom']);
Route::middleware('auth')->get('/dicom/{id}',[dicomController::class,'singleDicom']);
Route::get('/dicom', function () { return view('dicom');});

Route::get('/', function(){
    return view('master');
});

Route::get('{any}', function(){
    return view('master');
});


