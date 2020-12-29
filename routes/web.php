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

Route::get('/',  function () {
    return view('welcome');
});


Route::get('/login', 'loginController@index');
Route::post('/login', 'loginController@verify');
Route::get('/logout', 'logoutController@index');
Route::get('/search', 'LiveSearch@search');

Route::get('/pdf/{id}', 'ProductController@pdf');



Route::group(['middleware'=>['sess']], function(){

	Route::get('/home', 'homeController@index')->middleware('sess')->name('home.index');
	//Route::get('/userlist', 'homeController@userlist')->name('home.userlist');
	Route::get('/userlist', ['uses'=> 'homeController@userlist', 'as'=>'admin.userlist']);
	Route::get('/details/{id}', 'homeController@show');


	
		Route::get('/create', 'homeController@create')->name('home.create');
		Route::post('/create', 'homeController@store');
		Route::get('/user/edit/{id}', 'homeController@edit')->name('home.edit');
		Route::post('/user/edit/{id}', 'homeController@update');
		Route::get('/delete/{id}', 'homeController@deleted');
		Route::post('/delete/{id}', 'homeController@destroy');


		Route::get('/employee', 'ProductController@index')->name('employee.index');
		Route::get('/ProductCreate', 'ProductController@create')->name('product.create');
		Route::post('/ProductCreate', 'ProductController@ProductStore');
		Route::get('/ProductList', 'ProductController@ProductList')->name('product.ProductList');
		Route::get('/products/edit/{id}', 'ProductController@edit')->name('product.edit');
		Route::post('/products/edit/{id}', 'ProductController@updateProduct');
		Route::get('/deleteProduct/{id}', 'ProductController@productDeleted');
		Route::post('/deleteProduct/{id}', 'ProductController@destroyProduct');


});

//Route::resource('/product', 'ProductController');


