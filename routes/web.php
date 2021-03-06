<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\EncryptDecryptController;


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
    return view('index');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
Route::get('/file-upload', [FileManagerController::class, 'index'])->name('upload');
Route::post('/submit-file', [EncryptDecryptController::class, 'store'])->name('submitF');
Route::get('/view-files', [FileManagerController::class, 'show'])->name('view');
Route::delete('/delete/{id}', [FileManagerController::class, 'delete'])->name('delete');

Route::get('/decrypt/{id}', [EncryptDecryptController::class, 'show'])->name('decrypt');
Route::post('/decrypt', [EncryptDecryptController::class, 'decrypt'])->name('check');
});

