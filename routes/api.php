<?php

use Illuminate\Http\Request;

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


// Products
Route::get('products', 'ProductController@index');
Route::get('products/{product}', 'ProductController@show');
Route::post('products/store', 'ProductController@store');
Route::get('products/edit', 'ProductController@edit');
Route::post('products/{product}/images', 'ProductController@uploadImages');
Route::delete('products/{product}/image/{image}', 'ProductController@removeImage');
Route::patch('products/update/{product}', 'ProductController@update');
Route::patch('products/updateActive', 'ProductController@updateActive');
Route::delete('products/destroy/{product}', 'ProductController@destroy');

// Houses
Route::get('houses', 'HouseController@index');
Route::get('houses/{house}', 'HouseController@show');
Route::get('houses/{house}/amenities', 'HouseController@getAmenities');
Route::post('houses/{house}/amenities/{amenity}', 'HouseController@updateHouseAmenities');
Route::post('houses/store', 'HouseController@store');
Route::get('houses/edit', 'HouseController@edit');
Route::post('houses/{house}/images', 'HouseController@uploadImages');
Route::delete('houses/{house}/image/{image}', 'HouseController@removeImage');
Route::patch('houses/update/{house}', 'HouseController@update');
Route::patch('houses/updateActive', 'HouseController@updateActive');
Route::delete('houses/destroy/{house}', 'HouseController@destroy');


Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Settings
    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');
    Route::patch('settings/manage/role', 'Settings\UserController@update');
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('email/verify/{user}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend');

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');
});

// Mailers
Route::prefix('mail')->group(function () {
    Route::post('contact', 'ContactController@contact');
    Route::post('recommendHost', 'ContactController@recommendHost');
});

// Checkout
Route::prefix('checkout')->group(function () {
    Route::get('intent-payment-method', 'CheckoutController@intentPaymentMethod');
    Route::post('cart', 'CheckoutController@cart');
    Route::post('charge', 'CheckoutController@charge');
});

