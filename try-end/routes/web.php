<?php

use Illuminate\Support\Facades\Route;
use App\Http\Models\DataModels;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data', [DataModels::class, 'tampilData']);