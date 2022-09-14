<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController; 
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
    return redirect()->route('arsip.index');
});
Route::resource('arsip', ArsipController::class);
Route::get('/detail/{id}', [ArsipController::class,'detailArsip'])->name('detail');
Route::get('/download/{file}',  [ArsipController::class,'download'])->name('download');
Route::get('/hapus/{noSurat}',  [ArsipController::class,'delete'])->name('hapus');
Route::post('/cari',  [ArsipController::class,'cari'])->name('cari');

Route::get('/about', function () {
    return view('about');
})->name('about');
