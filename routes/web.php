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

Auth::routes();

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
    Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.service.callback');
    Route::get('contact-us','ContactController@index')->name('contact-us');
    Route::post('contact-us','ContactController@save');    
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile','AccountController@index')->name('account');
    Route::put('/profile','AccountController@save');
    Route::get('/change-password','AccountController@changePassword')->name('account.changepassword');
    Route::put('/change-password','AccountController@updatePassword');    
});

Route::prefix(config('app.admin_dir'))->middleware(['guest:admin'])->group(function () {
    Route::get('/','Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/', 'Admin\LoginController@login');
    Route::post('password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/reset','Admin\ResetPasswordController@reset')->name('admin.password.update');
    Route::get('password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');    
    Route::get('register','Admin\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register','Admin\RegisterController@register');
});

Route::prefix(config('app.admin_dir'))->middleware(['auth:admin'])->group(function () {
    Route::get('home','Admin\AdminController@index')->name('admin.home');
    Route::get('settings','Admin\SettingController@index')->name('admin.settings');
    Route::post('settings','Admin\SettingController@storeGeneralSettings')->name('admin.settings');
    Route::get('settings/signin','Admin\SettingController@signin')->name('admin.settings.signin');
    Route::post('settings/signin','Admin\SettingController@storeSigninIntegrations')->name('admin.settings.signin');
    Route::get('profile','Admin\AdminController@profile')->name('admin.profile');
    Route::post('profile','Admin\AdminController@updateProfile');
    Route::get('profile/change-password','Admin\AdminController@changePassword')->name('admin.change_password');
    Route::post('profile/change-password','Admin\AdminController@updatePassword')->name('admin.change_password');
});

