<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('biodata', BiodataController::class);
Route::post('/biodata/delete-all', [BiodataController::class, 'deleteAll'])->name('biodata.deleteAll');
