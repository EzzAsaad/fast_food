<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('ms/api/v1/userByid/{id}' , [App\Http\Controllers\apis\UsersController::class , 'userByid']);
Route::get('ms/api/v1/users' , [App\Http\Controllers\apis\UsersController::class , 'users']);
Route::post('ms/api/v1/users/login' , [App\Http\Controllers\apis\UsersController::class , 'login']);
Route::post('ms/api/v1/users/register' , [App\Http\Controllers\apis\UsersController::class , 'register']);
Route::post('ms/api/v1/users/forgetPassword' , [App\Http\Controllers\apis\UsersController::class , 'forgetPassword']);
Route::post('ms/api/v1/users/changePassword' , [App\Http\Controllers\apis\UsersController::class , 'changePassword']);
Route::post('ms/api/v1/users/editUser' , [App\Http\Controllers\apis\UsersController::class , 'editUser']);




Route::get('ms/api/v1/AreaByid/{id}' , [App\Http\Controllers\apis\AreasController::class , 'AreaByid']);
Route::get('ms/api/v1/Areas' , [App\Http\Controllers\apis\AreasController::class , 'Areas']);




Route::get('ms/api/v1/categoriesByid/{id}' , [App\Http\Controllers\apis\CategoriesController::class , 'categoriesByid']);
Route::get('ms/api/v1/categories' , [App\Http\Controllers\apis\CategoriesController::class , 'categories']);




Route::get('ms/api/v1/productsByid/{id}' , [App\Http\Controllers\apis\ProductsController::class , 'productsByid']);
Route::get('ms/api/v1/products_category/{id}' , [App\Http\Controllers\apis\ProductsController::class , 'products_category']);
Route::get('ms/api/v1/products' , [App\Http\Controllers\apis\ProductsController::class , 'products']);
Route::get('ms/api/v1/products_size_ByProductID/{id}' , [App\Http\Controllers\apis\Products_sizeController::class , 'products_size_ByProductID']);
Route::get('ms/api/v1/products_sizeByid/{id}' , [App\Http\Controllers\apis\Products_sizeController::class , 'products_sizeByid']);


Route::get('ms/api/v1/products_offers_id/{status}/{id}' , [App\Http\Controllers\apis\OfferController::class , 'products_offers_id']);
Route::get('ms/api/v1/products_offers/{status}' , [App\Http\Controllers\apis\OfferController::class , 'products_offers']);
Route::get('ms/api/v1/offersByid/{id}' , [App\Http\Controllers\apis\OfferController::class , 'offersByid']);
Route::get('ms/api/v1/offers' , [App\Http\Controllers\apis\OfferController::class , 'offers']);



Route::get('ms/api/v1/chakeCoupon/{coupon_code}/{user_id}' , [App\Http\Controllers\apis\CouponController::class , 'chakeCoupon']);
Route::get('ms/api/v1/order_byid/{status}/{id}' , [App\Http\Controllers\apis\OrdersController::class , 'order_byid']);
Route::get('ms/api/v1/orders/{status}/{id}' , [App\Http\Controllers\apis\OrdersController::class , 'orders']);
Route::post('ms/api/v1/saveOrder' , [App\Http\Controllers\apis\OrdersController::class , 'saveOrder']);
Route::post('ms/api/v1/saveCoupon' , [App\Http\Controllers\apis\CouponController::class , 'saveCoupon']);


Route::get('ms/api/v1/addressByid/{id}' , [App\Http\Controllers\apis\AddressController::class , 'addressByid']);
Route::get('ms/api/v1/addressByUserID/{id}' , [App\Http\Controllers\apis\AddressController::class , 'addressByUserID']);



Route::get('ms/api/v1/Alladdones' , [App\Http\Controllers\apis\AddonesController::class , 'Alladdones']);
Route::post('ms/api/v1/saveAddones' , [App\Http\Controllers\apis\AddonesController::class , 'saveAddones']);


Route::post('ms/api/v1/saveAddress' , [App\Http\Controllers\apis\AddressController::class , 'saveAddress']);

Route::post('ms/api/v1/saveRate' , [App\Http\Controllers\apis\RateController::class , 'saveRate']);


Route::post('ms/api/v1/saveCart' , [App\Http\Controllers\apis\CartController::class , 'saveCart']);
Route::get('ms/api/v1/myCart/{id}' , [App\Http\Controllers\apis\CartController::class , 'myCart']);
Route::post('ms/api/v1/editCart' , [App\Http\Controllers\apis\CartController::class , 'editCart']);
Route::get('ms/api/v1/DeleteCartByid/{id}' , [App\Http\Controllers\apis\CartController::class , 'DeleteCartByid']);
Route::get('ms/api/v1/DeleteUserCartByid/{id}' , [App\Http\Controllers\apis\CartController::class , 'DeleteUserCartByid']);

