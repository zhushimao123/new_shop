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
//商品详情
Route::get('/detil', 'Goods\GoodsdetialController@detial');
Route::post('/cart', 'Goods\GoodsdetialController@cart');
Route::get('/cartdet', 'Cart\CartController@cartdet');


//联系我们
Route::get('/contact', 'contact\ContactController@contact');
//接受数据
Route::post('sendmail', 'contact\ContactController@sendmail');
//商品列表
Route::get('/product', 'goodslist\GoodsListController@goodslist');

//结算
Route::get('/order', 'order\OrderController@order');
//确人结算
Route::get('/orderdo', 'order\OrderController@orderdo');
//订单页面
Route::get('/orhtml', 'order\OrderController@orhtml');
//支付宝支付
Route::get('/alipay', 'order\OrderController@alipay');
//支付宝支付成功回调
Route::get('/succuess', 'order\OrderController@succuess');
//ajax轮询改变支付状态
Route::get('/paystatus', 'order\OrderController@paystatus');
//微信支付成功回调
Route::post('/wxnotify', 'order\OrderController@wxnotify');
