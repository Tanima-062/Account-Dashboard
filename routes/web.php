<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\Account\AccountController;

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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', [AccountController::class, 'index'])->name('accounts.index');
    Route::get('/create', [AccountController::class, 'create'])->name('accounts.create');
    Route::post('/save', [AccountController::class, 'store'])->name('accounts.store');
});

