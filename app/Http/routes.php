<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//home
Route::get('/cutestore','IndexController@index');
Route::post('/cutestore/hot','IndexController@hot');
Route::post('/cutestore/news','IndexController@news');

//user
Route::post('/cutestore/loginhandler','UsersController@loginhandler');
Route::get('/cutestore/logout','UsersController@logout');
Route::get('/cutestore/register','UsersController@register');
Route::post('/cutestore/registerhandler','UsersController@store');
//登入fb網址
Route::get('/cutestore/facebooklogin','UsersController@facebook');
//fb返回網址
Route::get('/cutestore/facebook/login','UsersController@facebookLogin');
//登入goo網址
Route::get('/cutestore/googlelogin','UsersController@google');
//goo返回網址
Route::get('/cutestore/google/login','UsersController@googleLogin');
Route::get('/cutestore/login','UsersController@login');

//product
Route::get('/cutestore/productlist','ProductController@seriesList');
Route::get('/cutestore/productseries/{serId}','ProductController@seriesList');
Route::get('/cutestore/productcategory/{categoryId}','ProductController@categoryList');
Route::get('/cutestore/product/{productId}','ProductController@detail');

//cart
Route::get('/cutestore/cart','CartController@index');
Route::post('/cutestore/addcart','CartController@addCart');
Route::post('/cutestore/removecart','CartController@removeCart');
Route::post('/cutestore/updatecart','CartController@updateCart');
Route::post('/cutestore/updatecartall','CartController@updateCartAll');
Route::get('/cutestore/cartproduct/{productId}/{cartId}','CartController@cartProduct');
Route::get('/cutestore/payment','CartController@payment');
Route::post('/cutestore/order','CartController@order');
Route::post('/cutestore/delcart','CartController@delCart');
//return
Route::post('/cutestore/pay','CartController@pay');
Route::post('/cutestore/cvs','CartController@cvs');
Route::post('/cutestore/atm','CartController@atm');
Route::get('/cutestore/cartdone/{orderNo}','CartController@cartdone');
Route::get('/cutestore/orderlist','CartController@orderList');
Route::get('/cutestore/delorder/{ordId}','CartController@delOrder');
Route::post('/cutestore/saveorder','CartController@saveOrder');
Route::post('/cutestore/loadorder','CartController@loadOrder');

//admin
Route::group(['prefix'=>'/cutestore/admin','middleware'=>'isAdmin'],function(){
	Route::get('orderlist','Admin\OrderController@orderList');
	Route::get('orderlistbycheck','Admin\OrderController@orderListCheck');
	Route::get('orderlistbyok','Admin\OrderController@orderListOk');
	Route::post('updateorder','Admin\OrderController@updateOrder');
	Route::post('delorder','Admin\OrderController@delOrder');

	Route::get('index','Admin\ProductController@productList');
	Route::get('addproduct','Admin\ProductController@addProduct');
	Route::post('addseries','Admin\ProductController@addSeries');
	Route::post('delseries','Admin\ProductController@delSeries');
	Route::post('updateseries','Admin\ProductController@updateSeries');
	Route::post('delcategories','Admin\ProductController@delCategory');
	Route::post('updatecategories','Admin\ProductController@updateCategory');
	Route::post('addcategory','Admin\ProductController@addCategory');
	Route::post('uploadimg','Admin\ProductController@uploadImg');
	Route::post('delimg','Admin\ProductController@delImg');
	Route::post('insertproduct','Admin\ProductController@insertProduct');
	Route::get('productlist','Admin\ProductController@productList');
	Route::get('productlist/hot','Admin\ProductController@productListHot');
	Route::get('productlist/category','Admin\ProductController@productListCategory');
	Route::post('updateproduct','Admin\ProductController@updateProduct');
	Route::post('delproduct','Admin\ProductController@delProduct');
	Route::get('productdetail/{pId}','Admin\ProductController@productDetail');
	Route::post('updateproductdetail','Admin\ProductController@updateProductDetail');

	Route::get('userlist','Admin\UserController@userList');
	Route::post('updateuser','Admin\UserController@updateUser');
	Route::post('deluser','Admin\UserController@delUser');
});

Route::get('/payment','CartController@payment');
Route::post('/order','CartController@order');
Route::get('/cart','CartController@index');
Route::get('/cvs','CartController@cvs');
Route::get('/cartdone/{orderNo}','CartController@cartdone');
Route::get('/orderlist','CartController@orderList');
Route::get('/delorder/{ordId}','CartController@delOrder');
Route::post('/admin/delcategories','Admin\ProductController@delCategory');
Route::get('/admin/orderlistbycheck','Admin\OrderController@orderListCheck');
Route::get('/admin/productlist','Admin\ProductController@productList');

Route::get('/productlist','ProductController@seriesList');
Route::get('/productseries/{serId}','ProductController@seriesList');
Route::get('/productcategory/{categoryId}','ProductController@categoryList');
Route::get('/product/{productId}','ProductController@detail');
Route::get('/productlist','ProductController@seriesList');