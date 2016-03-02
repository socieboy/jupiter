<?php
Route::auth();
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::resource('', 'DashboardController');
    Route::resource('user', 'UsersController');
    Route::resource('role', 'RolesController');
});
Route::group(['namespace' => 'API', 'middleware' => ['auth'], 'prefix' => 'api',], function () {
    Route::resource('user', 'UsersController');
    Route::post('user/{user}/roles', 'UserRolesController@update');
    Route::resource('role', 'RolesController');
    Route::post('role/{role}/permissions', 'RolesPermissionsController@update');
    Route::resource('permission', 'PermissionsController');
    Route::resource('file-browser', 'FileBrowserController');
});
