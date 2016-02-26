<?php

/*
|--------------------------------------------------------------------------
| Jupiter CMS Welcome Page
|--------------------------------------------------------------------------
|
| Here is the entrance to the frontpage of the cms.
| You can edit or add more routes for your custom pages.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('jupiter::welcome');
    });

});


