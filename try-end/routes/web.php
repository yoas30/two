<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data', [DataController::class, 'tampilData']);
Route::get('/aktivitas', [DataController::class, 'tampilDataAktivitas']);
Route::delete('/operators/{id}', [DataController::class, 'destroyOperator'])->name('operators.hapus');