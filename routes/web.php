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
//注册
Route::get('/register', 'user\UserController@register');
Route::post('/regdo', 'user\UserController@regdo');
//登录
Route::get('/login', 'user\UserController@login');
Route::post('/logindo', 'user\UserController@logindo');
//退出
Route::get('/logout', 'user\UserController@logout');
//联系我们
Route::get('/contact', 'contact\ContactController@contact')->middleware('checkLogin');
//接受数据
Route::post('/sendmail', 'contact\ContactController@sendmail');
//商品列表
Route::get('/product', 'goodslist\GoodsListController@goodslist');

