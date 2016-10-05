<?php

Route::get('{cate}', [
  'as' => 'user.category',
  'uses' => 'HomeController@category',
]);

Route::get('{category}/{product}', [
  'as' => 'user.product',
  'uses' => 'User\DetailController@product_detail',
]);
