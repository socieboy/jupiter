<?php
Route::auth();
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::resource('', 'DashboardController');
    Route::resource('user', 'UsersController');
    Route::resource('role', 'RolesController');
});
Route::group(['middleware' => ['auth'], 'prefix' => 'api',], function () {
    Route::resource('user', 'API\UsersController');
    Route::post('user/{user}/roles', 'API\UserRolesController@update');
    Route::resource('role', 'API\RolesController');
    Route::post('role/{role}/permissions', 'API\RolesPermissionsController@update');
    Route::resource('permission', 'API\PermissionsController');
});
