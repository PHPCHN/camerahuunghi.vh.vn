<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
  'as' => 'user.index',
  'uses' => 'HomeController@index',
]);

require __DIR__.'/user.php';
require __DIR__.'/admin.php';
