<?php

// DASHBOARD - DEFAULT
Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/file-manager', [App\Http\Controllers\Backend\DashboardController::class, 'file_manager'])->name('dashboard.file-manager');
Route::get('/dashboard/language/{language}', [App\Http\Controllers\Backend\DashboardController::class, 'language'])->name('language');
Route::get('/dashboard/logout', [App\Http\Controllers\Backend\DashboardController::class, 'logout'])->name('dashboard.logout');

// DASHBOARD - PROFILES
Route::get('/dashboard/profiles', function () { return redirect('/dashboard/profiles/account-informations'); });
Route::get('/dashboard/profiles/account-informations', [App\Http\Controllers\Backend\__System\ProfileController::class, 'account_information'])->name('dashboard.profile.account-information');
Route::patch('/dashboard/profiles/account-informations/update/{id}', [App\Http\Controllers\Backend\__System\ProfileController::class, 'account_information_update'])->name('dashboard.profile.account-information-update');
Route::get('/dashboard/profiles/change-password', [App\Http\Controllers\Backend\__System\ProfileController::class, 'change_password'])->name('dashboard.profile.change-password');
Route::post('/dashboard/profiles/update-password', [App\Http\Controllers\Backend\__System\ProfileController::class, 'update_password'])->name('dashboard.profile.update-password');
Route::get('/dashboard/profiles/account-informations/generate-new-token', [App\Http\Controllers\Backend\__System\ProfileController::class, 'generate_new_token'])->name('dashboard.profile.account-information.generate-new-token');
