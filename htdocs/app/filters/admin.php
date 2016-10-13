<?php
Route::filter('category_create', 'CategoryCreateFilter');
Route::filter('news_create', 'NewsCreateFilter');
Route::filter('product_create', 'ProductCreateFilter');
Route::filter('slider_create', 'SliderCreateFilter');
Route::filter('category_update', 'CategoryUpdateFilter');
Route::filter('news_update', 'NewsUpdateFilter');
Route::filter('product_update', 'ProductUpdateFilter');
Route::filter('slider_update', 'SliderUpdateFilter');
