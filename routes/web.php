<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ReportController;


Route::resource('students', StudentController::class);
Route::post('/report', [ReportController::class, 'generate'])->name('report');
