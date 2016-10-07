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
  'uses' => 'ProductController@create',
]);

Route::post('admin', [
  'as' => 'admin-post',
  'uses' => 'ProductController@store',
]);
