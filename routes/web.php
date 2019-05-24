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

//Route::get('/', function () {
//    return view('welcome');
//});
//首页
Route::get('/', 'home\HomeController@index');
//商品详情
Route::get('/detil', 'Goods\GoodsdetialController@detial');
Route::post('/cart', 'Goods\GoodsdetialController@cart');
Route::get('/cartdet', 'Cart\CartController@cartdet');
Route::post('/delete', 'Cart\CartController@delete');