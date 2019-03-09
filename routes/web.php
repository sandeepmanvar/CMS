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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile','AccountController@index')->name('account');
Route::put('/profile','AccountController@save');
Route::get('/change-password','AccountController@changePassword')->name('account.changepassword');
Route::put('/change-password','AccountController@updatePassword');

Route::get('admin/home','AdminController@index')->name('admin.home');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
Route::post('admin/password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/reset','Admin\ResetPasswordController@reset')->name('admin.password.update');
Route::get('admin/password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::get('admin/register','Admin\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('admin/register','Admin\RegisterController@register');

Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('contact-us','ContactController@index')->name('contact-us');
Route::post('contact-us','ContactController@save');

Route::resource('tests', 'TestController');