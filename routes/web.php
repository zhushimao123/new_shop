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

=======
>>>>>>> 2174e98db7c2aa00c2d3be43202f9a7e08a8c906
//商品详情
Route::get('/detil', 'Goods\GoodsdetialController@detial');
Route::post('/cart', 'Goods\GoodsdetialController@cart');
Route::get('/cartdet', 'Cart\CartController@cartdet');
<<<<<<< HEAD

=======
>>>>>>> 2174e98db7c2aa00c2d3be43202f9a7e08a8c906
//联系我们
Route::get('/contact', 'contact\ContactController@contact');
//接受数据
Route::post('sendmail', 'contact\ContactController@sendmail');
//商品列表
Route::get('/product', 'goodslist\GoodsListController@goodslist');
<<<<<<< HEAD


=======
>>>>>>> 2174e98db7c2aa00c2d3be43202f9a7e08a8c906
