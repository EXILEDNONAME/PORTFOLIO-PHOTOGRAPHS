<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('pages.frontend.index'); });
Route::get('/demo-1', function () { return view('pages.frontend.demo-1.index'); });
Route::get('/demo-2', function () { return view('pages.frontend.demo-2.index'); });
Route::get('/demo-3', function () { return view('pages.frontend.demo-3.index'); });

require __DIR__.'/auth.php';
require __DIR__.'/backend/dashboard.php';
require __DIR__.'/backend/administrative/application.php';
require __DIR__.'/backend/administrative/management.php';
require __DIR__.'/backend/administrative/session.php';
require __DIR__.'/backend/application/datatable.php';
