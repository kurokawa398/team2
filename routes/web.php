<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\dbcontroller;
use App\Http\Controllers\MemberController;

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

Route::get('/', [logincontroller::class, 'login']);
// Route::get('/logout', [logincontroller::class, 'logout']);

Route::get('/B001', function () {
    return view('page/B01');
});

Route::get('/test', function () {
    return view('page/test');
});

Route::get('/B003',[MemberController::class, 'member']);

Route::get('/B006',[MemberController::class, 'B006']);

Route::get('/B010',[dbcontroller::class, 'B010']);
Route::post('/B010',[dbcontroller::class, 'change']);

Route::get('/B012',[dbcontroller::class, 'B012']);
Route::post('/B012',[dbcontroller::class, 'delete']);
Route::post('/B12',[dbcontroller::class, 'add']);

Route::get('/registration', function () {
    return view('auth/register');
});

Route::get('/logout', function () {
    Auth::guard('web')->logout();


    return view('auth/login');
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
