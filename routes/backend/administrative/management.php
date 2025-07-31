<?php

// ADMINISTRATIVE - MANAGEMENT PERMISSIONS
Route::group([
  'as' => 'dashboard.system.administrative.management.permissions.',
  'prefix' => 'dashboard/administratives/managements/permissions',
  'namespace' => 'App\Http\Controllers\Backend\__System\Administrative\Management',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'PermissionController@active')->name('active');
  Route::get('activities', 'PermissionController@activity')->name('activity');
  Route::get('inactive/{id}', 'PermissionController@inactive')->name('inactive');
  Route::get('delete/{id}', 'PermissionController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'PermissionController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'PermissionController@restore')->name('restore');
  Route::get('trash', 'PermissionController@trash')->name('trash');
  Route::get('selected-active', 'PermissionController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'PermissionController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'PermissionController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'PermissionController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'PermissionController@selected_restore')->name('selected-restore');
  Route::resource('/', 'PermissionController')->parameters(['' => 'id']);
});

// ADMINISTRATIVE - MANAGEMENT ROLES
Route::group([
  'as' => 'dashboard.system.administrative.management.roles.',
  'prefix' => 'dashboard/administratives/managements/roles',
  'namespace' => 'App\Http\Controllers\Backend\__System\Administrative\Management',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'RoleController@active')->name('active');
  Route::get('activities', 'RoleController@activity')->name('activity');
  Route::get('inactive/{id}', 'RoleController@inactive')->name('inactive');
  Route::get('delete/{id}', 'RoleController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'RoleController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'RoleController@restore')->name('restore');
  Route::get('trash', 'RoleController@trash')->name('trash');
  Route::get('selected-active', 'RoleController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'RoleController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'RoleController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'RoleController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'RoleController@selected_restore')->name('selected-restore');
  Route::resource('/', 'RoleController')->parameters(['' => 'id']);
});

// ADMINISTRATIVES - MANAGEMENT USERS
Route::group([
  'as' => 'dashboard.system.administrative.management.users.',
  'prefix' => 'dashboard/administratives/managements/users',
  'namespace' => 'App\Http\Controllers\Backend\__System\Administrative\Management',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'UserController@active')->name('active');
  Route::get('activities', 'UserController@activity')->name('activity');
  Route::get('inactive/{id}', 'UserController@inactive')->name('inactive');
  Route::get('delete/{id}', 'UserController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'UserController@delete_permanent')->name('delete-permanent');
  Route::get('reset-password/{id}', 'UserController@reset_password')->name('reset-password');
  Route::get('reset-password-single/{id}', 'UserController@reset_password_single')->name('reset-password-single');
  Route::get('restore/{id}', 'UserController@restore')->name('restore');
  Route::get('trash', 'UserController@trash')->name('trash');
  Route::get('selected-active', 'UserController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'UserController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'UserController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'UserController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'UserController@selected_restore')->name('selected-restore');
  Route::resource('/', 'UserController')->parameters(['' => 'id']);
});
