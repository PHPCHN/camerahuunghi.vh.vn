<?php

Route::get('/', [
  'as' => 'user.index',
  'uses' => 'User\HomeController@hindex',
]);

Route::get('{cate}', [
  'as' => 'user.category',
  'uses' => 'User\HomeController@category',
]);

Route::get('{category}/{product}', [
  'as' => 'user.product',
  'uses' => 'User\DetailController@product_detail',
]);
