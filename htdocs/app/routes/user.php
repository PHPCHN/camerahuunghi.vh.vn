<?php

Route::get('/', [
  'as' => 'user.index',
  'uses' => 'IndexController@index',
]);

Route::get('search', [
  'as' => 'user.search',
  'uses' => 'IndexController@search',
]);

Route::post('dat-hang', [
  'as' => 'user.order',
  'uses' => 'OrderController@order',
]);

Route::get('tin-tuc', [
  'as' => 'user.newsall',
  'uses' => 'IndexController@news',
]);

Route::get('tin-tuc/{news}', [
  'as' => 'user.news',
  'uses' => 'DetailController@news',
]);

Route::get('{cate}', [
  'as' => 'user.category',
  'uses' => 'IndexController@category',
]);

Route::get('{category}/{product}', [
  'as' => 'user.product',
  'uses' => 'DetailController@product_detail',
]);
