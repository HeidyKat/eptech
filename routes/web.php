<?php

use Illuminate\Support\Facades\Route;

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

/*
*/

 Route::get('/', function () {
     return view('welcome');
 });



Route::resource('categories','CategoryController')->names('categories');
Route::resource('clients','ClientController')->names('clients');
Route::resource('products','ProductController')->names('products');

Route::post('upload/product/{id}/image','ProductController@upload_image')->name('upload.product.image');

Route::get('/prueba', function () {
    return view('prueba');
});



Route::get('/productos', function () {
    return view('web.shop_grid');
});

Route::get('/detalles', function () {
    return view('web.product_details');
});

Route::get('/micuenta', function () {
    return view('web.my_account');
});

Route::get('/registro', function () {
    return view('web.login_register');
});
Route::get('/contacto', function () {
    return view('web.contact_us');
});
Route::get('/carrito', function () {
    return view('web.cart');
});
Route::get('/blog', function () {
    return view('web.blog');
});
Route::get('/blog_detalles', function () {
     return view('web.blog_details');
 });
 Route::get('/nosotros', function () {
     return view('web.about_us');
 });
 Route::get('/pagar', function () {
     return view('web.checkout');
 });


 Route::get('/barcode',function(){
     $products=Product::get();
     return view('admin.product.barcode',compact('products'));
 });

//  Auth::routes();
//  Route::get('/home','HomeController@index')->name('home');

//Peticiones AJAX
Route::get('get_subcategories','AjaxController@get_subcategories')->name('get_subcategories');

Route::get('get_products_by_subcategory','AjaxController@get_products_by_subcategory')->name('get_products_by_subcategory');

//rutas para las subcategorias
Route::resource('subcategories','SubcategoryController')->except(['edit','update'])->names('subcategories');

Route::get('category/{category}/subcategory/{subcategory}/update','SubcategoryController@update')->name('subcategories.update');
Route::get('category/{category}/subcategory/{subcategory}','SubcategoryController@edit')->name('subcategories.edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
