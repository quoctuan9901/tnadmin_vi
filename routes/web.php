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

Route::namespace('Frontend')->group(function () {
    Route::get('/', function () {
	    return view('welcome');
	});
});

Route::get('refresh-captcha', function () {
    return response()->json(['captcha'=> captcha_img()]);
});

Route::group(['prefix' => 'login','namespace' => 'Auth'],function () {
	Route::get('facebook', 'SocialLoginController@redirectToProviderFacebook')->name('loginFacebook');
	Route::get('facebook/callback', 'SocialLoginController@handleProviderCallbackFacebook')->name('callBackFacebook');
	Route::get('google', 'SocialLoginController@redirectToProviderGoogle')->name('loginGoogle');
	Route::get('google/callback', 'SocialLoginController@handleProviderCallbackGoogle')->name('callBackGoogle');
});

Route::group(['prefix' => 'tnadmin','namespace' => 'Auth'],function () {
    Route::get('login', 'LoginController@getLogin')->name('getLogin');
	Route::post('login', 'LoginController@postLogin')->name('postLogin');
	Route::get('logout', 'LoginController@getLogout')->name('logout');
});

Route::group(['prefix' => 'tnadmin','namespace' => 'Backend','middleware' => 'authen'], function () {
	Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');
	Route::get('config', 'DashboardController@getConfig')->name('admin.dashboard.config')->middleware('role:config');
	Route::post('config', 'DashboardController@postConfig')->name('admin.dashboard.config')->middleware('role:config');

	Route::group(['prefix' => 'category'], function () {
		Route::get('/', 'CategoryController@index')->name('admin.category')->middleware('role:list_cate');
		Route::get('list', 'CategoryController@index')->name('admin.category.index')->middleware('role:list_cate');
		Route::get('add', 'CategoryController@create')->name('admin.category.create')->middleware('role:add_cate');
		Route::post('add', 'CategoryController@store')->name('admin.category.store')->middleware('role:add_cate');
		Route::get('edit/{id}', 'CategoryController@edit')->name('admin.category.edit')->middleware('role:edit_cate');
		Route::post('edit/{id}', 'CategoryController@update')->name('admin.category.update')->middleware('role:edit_cate');
		Route::get('delete/{id}', 'CategoryController@destroy')->name('admin.category.destroy')->middleware('role:delete_cate');
	});

	Route::group(['prefix' => 'user'], function () {
		Route::get('/', 'UserController@index')->name('admin.user')->middleware('role:list_user');
		Route::get('list', 'UserController@index')->name('admin.user.index')->middleware('role:add_user');
		Route::get('add', 'UserController@create')->name('admin.user.create')->middleware('role:add_user');
		Route::post('add', 'UserController@store')->name('admin.user.store')->middleware('role:edit_user');
		Route::get('show/{id}', 'UserController@show')->name('admin.user.show');
		Route::get('edit/{id}', 'UserController@edit')->name('admin.user.edit')->middleware('role:edit_user');
		Route::post('edit/{id}', 'UserController@update')->name('admin.user.update')->middleware('role:edit_user');
		Route::get('delete/{id}', 'UserController@destroy')->name('admin.user.destroy')->middleware('role:delete_user');
		Route::get('edit-my-self', 'UserController@getEditMyself')->name('admin.user.get-edit-myself');
		Route::post('edit-my-self', 'UserController@postEditMyself')->name('admin.user.update.post-edit-myself');
	});

	Route::group(['prefix' => 'post'], function () {
		Route::get('/', 'PostController@index')->name('admin.post')->middleware('role:list_post');
		Route::get('list', 'PostController@index')->name('admin.post.index')->middleware('role:list_post');
		Route::get('add', 'PostController@create')->name('admin.post.create')->middleware('role:add_post');
		Route::post('add', 'PostController@store')->name('admin.post.store')->middleware('role:add_post');
		Route::get('show/{id}', 'PostController@show')->name('admin.post.show');
		Route::get('edit/{id}', 'PostController@edit')->name('admin.post.edit')->middleware('role:edit_post');
		Route::post('edit/{id}', 'PostController@update')->name('admin.post.update')->middleware('role:edit_post');
		Route::get('delete/{id}', 'PostController@destroy')->name('admin.post.destroy')->middleware('role:delete_post');
	});

	Route::group(['prefix' => 'news'], function () {
		Route::get('/', 'NewsController@index')->name('admin.news')->middleware('role:list_news');
		Route::get('list', 'NewsController@index')->name('admin.news.index')->middleware('role:list_news');
		Route::get('add', 'NewsController@create')->name('admin.news.create')->middleware('role:add_news');
		Route::post('add', 'NewsController@store')->name('admin.news.store')->middleware('role:add_news');
		Route::get('show/{id}', 'NewsController@show')->name('admin.news.show');
		Route::get('edit/{id}', 'NewsController@edit')->name('admin.news.edit')->middleware('role:edit_news');
		Route::post('edit/{id}', 'NewsController@update')->name('admin.news.update')->middleware('role:edit_news');
		Route::get('delete/{id}', 'NewsController@destroy')->name('admin.news.destroy')->middleware('role:delete_news');
	});

	Route::group(['prefix' => 'tags'], function () {
		Route::get('/', 'TagsController@index')->name('admin.tags')->middleware('role:list_tag');
		Route::get('list', 'TagsController@index')->name('admin.tags.index')->middleware('role:list_tag');
		Route::get('add', 'TagsController@create')->name('admin.tags.create')->middleware('role:add_tag');
		Route::post('add', 'TagsController@store')->name('admin.tags.store')->middleware('role:add_tag');
		Route::get('edit/{id}', 'TagsController@edit')->name('admin.tags.edit')->middleware('role:edit_tag');
		Route::post('edit/{id}', 'TagsController@update')->name('admin.tags.update')->middleware('role:edit_tag');
		Route::get('delete/{id}', 'TagsController@destroy')->name('admin.tags.destroy')->middleware('role:delete_tag');
	});

	Route::group(['prefix' => 'manufacturer'], function () {
		Route::get('/', 'ManufacturerController@index')->name('admin.manufacturer')->middleware('role:list_manufacturer');
		Route::get('list', 'ManufacturerController@index')->name('admin.manufacturer.index')->middleware('role:list_manufacturer');
		Route::get('add', 'ManufacturerController@create')->name('admin.manufacturer.create')->middleware('role:add_manufacturer');
		Route::post('add', 'ManufacturerController@store')->name('admin.manufacturer.store')->middleware('role:add_manufacturer');
		Route::get('edit/{id}', 'ManufacturerController@edit')->name('admin.manufacturer.edit')->middleware('role:edit_manufacturer');
		Route::post('edit/{id}', 'ManufacturerController@update')->name('admin.manufacturer.update')->middleware('role:edit_manufacturer');
		Route::get('delete/{id}', 'ManufacturerController@destroy')->name('admin.manufacturer.destroy')->middleware('role:delete_manufacturer');
	});

	Route::group(['prefix' => 'attribute'], function () {
		Route::get('/', 'AttributeController@index')->name('admin.attribute')->middleware('role:list_attribute');
		Route::get('list', 'AttributeController@index')->name('admin.attribute.index')->middleware('role:list_attribute');
		Route::get('add', 'AttributeController@create')->name('admin.attribute.create')->middleware('role:add_attribute');
		Route::post('add', 'AttributeController@store')->name('admin.attribute.store')->middleware('role:add_attribute');
		Route::get('edit/{id}', 'AttributeController@edit')->name('admin.attribute.edit')->middleware('role:edit_attribute');
		Route::post('edit/{id}', 'AttributeController@update')->name('admin.attribute.update')->middleware('role:edit_attribute');
		Route::get('delete/{id}', 'AttributeController@destroy')->name('admin.attribute.destroy')->middleware('role:delete_attribute');
	});

	Route::group(['prefix' => 'product'], function () {
		Route::get('/', 'ProductController@index')->name('admin.product')->middleware('role:list_product');
		Route::get('list', 'ProductController@index')->name('admin.product.index')->middleware('role:list_product');
		Route::get('add', 'ProductController@create')->name('admin.product.create')->middleware('role:add_product');
		Route::post('add', 'ProductController@store')->name('admin.product.store')->middleware('role:add_product');
		Route::get('show/{id}', 'ProductController@show')->name('admin.product.show');
		Route::get('edit/{id}', 'ProductController@edit')->name('admin.product.edit')->middleware('role:edit_product');
		Route::post('edit/{id}', 'ProductController@update')->name('admin.product.update')->middleware('role:edit_product');
		Route::get('delete/{id}', 'ProductController@destroy')->name('admin.product.destroy')->middleware('role:delete_product');
	});

	Route::group(['prefix' => 'position'], function () {
		Route::get('/', 'PositionController@index')->name('admin.position')->middleware('role:list_position');
		Route::get('list', 'PositionController@index')->name('admin.position.index')->middleware('role:list_position');
		Route::get('add', 'PositionController@create')->name('admin.position.create')->middleware('role:add_position');
		Route::post('add', 'PositionController@store')->name('admin.position.store')->middleware('role:add_position');
		Route::get('edit/{id}', 'PositionController@edit')->name('admin.position.edit')->middleware('role:edit_position');
		Route::post('edit/{id}', 'PositionController@update')->name('admin.position.update')->middleware('role:edit_position');
		Route::get('delete/{id}', 'PositionController@destroy')->name('admin.position.destroy')->middleware('role:delete_position');
	});

	Route::group(['prefix' => 'banner'], function () {
		Route::get('/', 'BannerController@index')->name('admin.banner')->middleware('role:list_banner');
		Route::get('list', 'BannerController@index')->name('admin.banner.index')->middleware('role:list_banner');
		Route::get('add', 'BannerController@create')->name('admin.banner.create')->middleware('role:add_banner');
		Route::post('add', 'BannerController@store')->name('admin.banner.store')->middleware('role:add_banner');
		Route::get('edit/{id}', 'BannerController@edit')->name('admin.banner.edit')->middleware('role:edit_banner');
		Route::post('edit/{id}', 'BannerController@update')->name('admin.banner.update')->middleware('role:edit_banner');
		Route::get('delete/{id}', 'BannerController@destroy')->name('admin.banner.destroy')->middleware('role:delete_banner');
	});

	Route::group(['prefix' => 'role'], function () {
		Route::get('/', 'RoleController@index')->name('admin.role')->middleware('role:list_role');
		Route::get('list', 'RoleController@index')->name('admin.role.index')->middleware('role:list_role');
		Route::get('add', 'RoleController@create')->name('admin.role.create')->middleware('role:add_role');
		Route::post('add', 'RoleController@store')->name('admin.role.store')->middleware('role:add_role');
		Route::get('edit/{id}', 'RoleController@edit')->name('admin.role.edit')->middleware('role:edit_role');
		Route::post('edit/{id}', 'RoleController@update')->name('admin.role.update')->middleware('role:edit_role');
		Route::get('delete/{id}', 'RoleController@destroy')->name('admin.role.destroy')->middleware('role:delete_role');
	});

	Route::group(['prefix' => 'contact'], function () {
		Route::get('/', 'ContactController@index')->name('admin.contact')->middleware('role:list_contact');
		Route::get('list', 'ContactController@index')->name('admin.contact.index')->middleware('role:list_contact');
		Route::get('add', 'ContactController@create')->name('admin.contact.create')->middleware('role:add_contact');
		Route::post('add', 'ContactController@store')->name('admin.contact.store')->middleware('role:add_contact');
		Route::get('edit/{id}', 'ContactController@edit')->name('admin.contact.edit')->middleware('role:edit_contact');
		Route::post('edit/{id}', 'ContactController@update')->name('admin.contact.update')->middleware('role:edit_contact');
		Route::get('delete/{id}', 'ContactController@destroy')->name('admin.contact.destroy')->middleware('role:delete_contact');
	});

	Route::group(['prefix' => 'mail'], function () {
		Route::get('/', 'MailController@index')->name('admin.mail')->middleware('role:mail');
		Route::get('send', 'MailController@getSend')->name('admin.mail.getSend')->middleware('role:sent_mail');
		Route::post('send', 'MailController@postSend')->name('admin.mail.postSend')->middleware('role:sent_mail');
		Route::get('delete/{id}', 'MailController@destroy')->name('admin.mail.destroy')->middleware('role:delete_mail');
	});

	Route::group(['prefix' => 'comment'], function () {
		Route::get('/', 'CommentController@index')->name('admin.comment')->middleware('role:comment');
		Route::get('reply/{id}', 'CommentController@getReply')->name('admin.comment.getReply')->middleware('role:reply_comment');
		Route::post('reply/{id}', 'CommentController@postReply')->name('admin.comment.postReply')->middleware('role:reply_comment');
		Route::get('delete/{id}', 'CommentController@destroy')->name('admin.comment.destroy')->middleware('role:delete_comment');
	});

	Route::group(['prefix' => 'log'], function () {
		Route::get('action', 'LogController@listLogAction')->name('admin.log.list_action')->middleware('role:list_action');
		Route::get('action/delete/{id}', 'LogController@destroyOneLogAction')->name('admin.log.delete_one_action')->middleware('role:delete_one_action');
		Route::get('action/delete-all', 'LogController@destroyAllLogAction')->name('admin.log.delete_all_action')->middleware('role:delete_all_action');
		Route::get('login', 'LogController@listLogLogin')->name('admin.log.list_login')->middleware('role:list_login');
		Route::get('login/delete/{id}', 'LogController@destroyOneLogLogin')->name('admin.log.delete_one_login')->middleware('role:delete_one_login');;
		Route::get('login/delete-all', 'LogController@destroyAllLogLogin')->name('admin.log.delete_all_login')->middleware('role:delete_all_login');
	});

	Route::group(['prefix' => 'ajax'], function () {
		Route::post('switch', 'AjaxController@switch_change')->name('admin.ajax.switch');
		Route::post('position', 'AjaxController@position')->name('admin.ajax.position');
		Route::get('attribute', 'AjaxController@attribute')->name('admin.ajax.attribute');
		Route::post('change-position', 'AjaxController@change_position')->name('admin.ajax.change_position');
	});
});