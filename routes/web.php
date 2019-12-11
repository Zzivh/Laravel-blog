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

// 用户模块

// 注册页面
Route::get('/register', 'RegisterController@index');
// 注册行为
Route::post('/register', 'RegisterController@register');
// 登录页面
Route::get('/login', 'LoginController@index');
// 登录行为
Route::post('/login', 'LoginController@login');
// 登出行为
Route::get('/logout', 'LoginController@logout');
// 个人设置
Route::get('/user/me/setting', 'UserController@setting');
// 个人设置操作
Route::post('/user/me/setting', 'UserController@settingStore');

// 文章列表页
Route::get('/posts', 'PostController@index');
// 文章搜索页
Route::get('/posts/search', 'PostController@search');
// 创建文章
Route::get('/posts/create', 'PostController@create');
Route::post('posts', 'PostController@store');
// 文章详情页
Route::get('/posts/{post}', 'PostController@show');
Route::get('/posts/{post}/zan', 'PostController@zan');
Route::get('/posts/{post}/unzan', 'PostController@unzan');
// 编辑文章
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::put('posts/{post}', 'PostController@update');
// 删除文章
Route::get('/posts/{post}/delete', 'PostController@delete');
// 图片上传
Route::post('/posts/image/upload', 'PostController@imageUpload');
// 提交评论
Route::post('/posts/{post}/comment', 'PostController@comment');
// 个人中心
Route::get('/user/{user}', 'UserController@show');
// 赞
Route::post('/user/{user}/fan', 'UserController@fan');
Route::post('/user/{user}/unfan', 'UserController@unfan');

// 专题详情页
Route::get('/topic/{topic}', 'TopicController@show');
// 投稿
Route::post('/topic/{topic}/submit', 'TopicController@submit');

