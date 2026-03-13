<?php

use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tugas', TugasController::class)
    ->except(['show'])
    ->parameters(['tugas' => 'id']);
