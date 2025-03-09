<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::middleware('auth')->group(function () {
    Route::get('/admin', [UserController::class, 'index']);
});

Route::get('/', [ContactController::class, 'contact']);

Route::get('/thanks', [ContactController::class, 'thanks']);
Route::get('/', [ContactController::class, 'home']);

Route::get('/', [CategoryController::class, 'contact']);
