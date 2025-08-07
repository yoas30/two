<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data', [DataController::class, 'tampilDataOperators']);
Route::get('/aktivitas', [DataController::class, 'tampilDataAktivitas']);
Route::delete('/operators/{operator_id}', [DataController::class, 'destroyOperator'])->name('operators.hapus');