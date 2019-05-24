<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//首页
Route::get('/', 'home\HomeController@index');
<<<<<<< HEAD
//商品详情
Route::get('/detil', 'Goods\GoodsdetialController@detial');
Route::post('/cart', 'Goods\GoodsdetialController@cart');
Route::get('/cartdet', 'Cart\CartController@cartdet');
=======
//联系我们
Route::get('/contact', 'contact\ContactController@contact');
//接受数据
Route::post('sendmail', 'contact\ContactController@sendmail');
//商品列表
Route::get('/product', 'goodslist\GoodsListController@goodslist');

>>>>>>> fd25556f8c66cd56d07e899307a9d3a6ad3cbf72
