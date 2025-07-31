<?php

// ADMINISTRATIVE APPLICATIONS - CUSTOMIZATIONS
Route::get('/dashboard/administratives/applications/customizations', [App\Http\Controllers\Backend\__System\Administrative\Application\CustomizationController::class, 'index'])->name('dashboard.administrative.application.customization.index');
Route::patch('/dashboard/administratives/applications/customizations/update/{id}', [App\Http\Controllers\Backend\__System\Administrative\Application\CustomizationController::class, 'update'])->name('dashboard.administrative.customization.application.update');

// ADMINISTRATIVE APPLICATIONS - OPTIMIZATIONS
Route::group([
  'as' => 'dashboard.system.administrative.application.optimizations.',
  'prefix' => 'dashboard/administratives/applications/optimizations',
  'namespace' => 'App\Http\Controllers\Backend\__System\Administrative\Application',
  'middleware' => 'auth',
], function () {
  Route::get('start-optimizing/{id}', 'OptimizationController@start_optimizing')->name('start-optimizing');
  Route::get('/', 'OptimizationController@index');
});

// ADMINISTRATIVE APPLICATIONS - SETTINGS
Route::get('/dashboard/administratives/applications/settings', [App\Http\Controllers\Backend\__System\Administrative\Application\SettingController::class, 'index'])->name('dashboard.administrative.application.setting.index');
Route::patch('/dashboard/administratives/applications/settings/update/{id}', [App\Http\Controllers\Backend\__System\Administrative\Application\SettingController::class, 'update'])->name('dashboard.administrative.application.setting.update');
