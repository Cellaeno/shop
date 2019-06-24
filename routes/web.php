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
























































































// 前台

// 网站首页
Route::get('/', 'Home\IndexController@index');


// 显示 前台 主页面
Route::resource('index','Home\IndexController');


// 个人中心

// 显示 修改用户个人基本信息 页面
Route::get('/home/users/elementInfo','Home\UsersController@elementInfo');
// 保存 修改用户个人基本信息
Route::post('/home/users/saveInfo/{id}/{token}','Home\UsersController@saveInfo');
// 保存 修改用户头像
Route::post('/home/users/saveFace/{id}','Home\UsersController@saveFace');
// 前台 用户中心 激活邮箱
Route::get('/home/users/email/{id}/{token}','Home\UsersController@email');
// 前台 修改密码
Route::post('/home/users/updateUpwd','Home\UsersController@updateUpwd');
// 前台 修改手机
Route::post('/home/users/updatePhone','Home\UsersController@updatePhone');
// 前台 修改邮箱
Route::post('/home/users/updateEmail','Home\UsersController@updateEmail');
// 显示 前台 用户中心 主页面
Route::resource('users','Home\UsersController');

// 显示 前台 用户中心 我的订单页面
Route::resource('order','Home\OrderController');
// 显示 前台 用户中心 地址管理页面
Route::resource('address','Home\AddressController');
// 显示 前台 用户中心 我的收藏 页面
Route::resource('collect','Home\CollectController');
// 显示 前台 用户中心 个人评论 主页面
Route::resource('discuss','Home\DiscussController');


// 显示 前台 列表 主页面
Route::resource('list','Home\ListController');

// 显示 前台 商品 详情页面
Route::resource('detail','Home\DetailController');


// 购物车

// 显示 前台 购物车 提交 订单成功 页面
Route::get('/home/buycar/paymoney','Home\BuycarController@paymoney');
// 购物车 商品 +1 (未登录用户)
Route::get('/home/buycar/addNum','Home\BuycarController@addNum');
// 购物车 商品 -1 (未登录用户)
Route::get('/home/buycar/descNum','Home\BuycarController@descNum');
// 购物车 商品 删除 (未登录用户)
Route::get('/home/buycar/del','Home\BuycarController@del');
// 添加商品到购物车 (未登录用户)
Route::get('home/buycar/add','Home\BuycarController@add');
// 商品 结算页
Route::get('home/buycar/account','Home\BuycarController@account');

// 购物车 商品 +1 (登录用户)
Route::get('/home/buycar/addOne','Home\BuycarController@addOne');
// 购物车 商品 -1 (登录用户)
Route::get('/home/buycar/descOne','Home\BuycarController@descOne');
// 购物车 商品 删除 (登录用户)
Route::get('/home/buycar/des','Home\BuycarController@des');
// 确认订单 商品 删除 (登录用户)
Route::get('/home/buycar/remove','Home\BuycarController@remove');

// 显示 前台 购物车 详情页面
Route::resource('buycar','Home\BuycarController');


// 

// 显示 前台 特卖场 主页面
Route::resource('salelimit','Home\SalelimitController');
// 显示 前台 活动 主页面
Route::resource('active','Home\ActiveController');
// 显示 前台 品牌 列表页面
Route::resource('brand','Home\BrandController');


// 前台 登录 退出
Route::post('home/login/dologin','Home\LoginController@dologin');
Route::get('home/login/logout','Home\LoginController@logout');
Route::resource('home/login','Home\LoginController');

// 前台 注册用户
Route::get('home/register','Home\RegisterController@index');
Route::get('home/register/sendPhone','Home\RegisterController@sendPhone');
Route::post('home/register/phone','Home\RegisterController@phone');
Route::post('home/register/email','Home\RegisterController@email');
Route::get('home/register/changeStatus/{id}/{token}','Home\RegisterController@changeStatus');


