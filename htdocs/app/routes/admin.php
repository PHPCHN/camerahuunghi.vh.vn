<?php

Route::get('login', [
  'as' => 'login',
  'uses' => 'AuthController@getLogin',
]);

Route::post('login', [
  'as' => 'login-post',
  'uses' => 'AuthController@postLogin',
]);

Route::get('logout', [
  'as' => 'logout',
  'uses' => 'AuthController@getLogout',
]);

Route::get('admin', [
  'as' => 'admin',
  'uses' => 'AuthController@index',
]);

Route::group(['prefix' => 'admin'], function () {
  Route::resource('product', 'ProductController');
});
