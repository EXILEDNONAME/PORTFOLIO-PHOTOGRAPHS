<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('pages.frontend.index'); });

require __DIR__.'/auth.php';
require __DIR__.'/backend/dashboard.php';
require __DIR__.'/backend/administrative/application.php';
require __DIR__.'/backend/administrative/management.php';
require __DIR__.'/backend/administrative/session.php';
require __DIR__.'/backend/application/datatable.php';
