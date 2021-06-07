<?php

use App\Http\Controllers\Admin\Home\HomeController;
use App\Http\Controllers\Admin\Kelas\KelasController;
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



Route::redirect('/', '/admin');
Auth::routes();
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', HomeController::class)->name('home');

    // Kelas
    Route::resource('kelas', KelasController::class)->parameters(['kelas' => 'kelas']);

    // Siswa
    /* ... */

    // Guru
    /* ... */
});
