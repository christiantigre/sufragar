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


Route::group(['prefix' => 'estudiante'], function () {
  Route::get('/login', 'EstudianteAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'EstudianteAuth\LoginController@login');
  Route::post('/logout', 'EstudianteAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'EstudianteAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'EstudianteAuth\RegisterController@register');

  Route::post('/password/email', 'EstudianteAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'EstudianteAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'EstudianteAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'EstudianteAuth\ResetPasswordController@showResetForm');
});



Route::get('/admin', 'AdminAuth\AdminController@index');
Route::get('/administracion', 'AdminAuth\AdminController@index');
Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
  Route::get('/home', 'AdminAuth\AdminController@index')->name('home');
  Route::get('/addmember/{idlista}', 'AdminAuth\\IntegranteController@addmember');
});

Route::resource('admin/institution', 'AdminAuth\\InstitutionController');
Route::resource('admin/list', 'AdminAuth\\ListController');
Route::resource('admin/integrante', 'AdminAuth\\IntegranteController');
Route::resource('admin/list', 'AdminAuth\\ListController');
Route::resource('admin/voto', 'AdminAuth\\VotoController');


Route::resource('admin/course', 'AdminAuth\\CourseController');
Route::resource('admin/paralelo', 'AdminAuth\\ParaleloController');
Route::resource('admin/cargo', 'AdminAuth\\CargoController');

Route::post('/ingreso', 'HomeController@ingreso');
Route::get('/verlista/{idlista}/{codigo_estudiante}', 'HomeController@verlista'); 
//Route::get('/votolista/{idlista}/{codigo_estudiante}', 'HomeController@votolista');
Route::post('/votolista', 'HomeController@votolista');
Route::get('/votonulo/{codigo_estudiante}', 'HomeController@votonulo');

