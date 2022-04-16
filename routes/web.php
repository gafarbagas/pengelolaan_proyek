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

Route::get('/login', 'AuthController@login')
    ->name('login');

Route::get('/lupapassword', 'AuthController@lupapassword');

Route::post('/postlogin', 'AuthController@postlogin');

Route::get('/logout', 'AuthController@logout');


Route::group(['middleware' => 'auth','checkrole:Admin, Pemilik'], function () {

    // Route Pengguna
    Route::get('/pengguna', 'UsersController@index')->name('users');
    Route::get('/pengguna/tambah', 'UsersController@create')->name('createuser');
    Route::post('/pengguna', 'UsersController@store');
    Route::get('/pengguna/laporan', 'UsersController@laporan')->name('userreport');
    Route::get('/pengguna/{user}/ubahkatasandi', 'UsersController@editpasswordform');
    Route::post('/pengguna/{user}/ubahkatasandi', 'UsersController@editpassword');
    Route::get('/pengguna/{user}/edit', 'UsersController@edit')->name('edituser');
    Route::get('/pengguna/{user}', 'UsersController@show');
    Route::patch('/pengguna/{user}', 'UsersController@update');
    Route::delete('/pengguna/{user}', 'UsersController@destroy')->name('deleteuser');    

    // Route Developer
    Route::get('/pengembang', 'DevelopersController@index')->name('developers');
    Route::get('/pengembang/tambah', 'DevelopersController@create')->name('createdeveloper');
    Route::get('/pengembang/laporan', 'DevelopersController@laporan')->name('developerreport');
    Route::post('/pengembang', 'DevelopersController@store');
    Route::get('/pengembang/{developer}/edit', 'DevelopersController@edit')->name('editdeveloper');
    Route::patch('/pengembang/{developer}', 'DevelopersController@update');
    Route::delete('/pengembang/{developer}', 'DevelopersController@destroy')->name('deletedeveloper');

});

Route::group(['middleware' => 'auth','checkrole: Admin, Operator, Pemilik'], function () {

    Route::get('/', 'AdminsController@index')->name('home');

    // Route Profil
    Route::get('/profil', 'ProfilesController@profil');
    Route::post('/profil', 'ProfilesController@update_profile');
    Route::get('/profil/{user}/edit', 'ProfilesController@edit');
    Route::get('/ubahkatasandi', 'ProfilesController@ubahkatasandi');
    Route::post('/ubahkatasandi', 'ProfilesController@update_password');
    
    // Route Proyek
    Route::get('/proyek', 'ProjectsController@index')->name('projects');
    Route::get('/proyek/tambah', 'ProjectsController@create')->name('create');
    Route::get('/proyek/laporan', 'ProjectsController@exportPDF')->name('projectreport');
    Route::get('/proyek/cetak', 'ProjectsController@print')->name('projectprint');
    Route::get('/proyek/{project}', 'ProjectsController@show');
    Route::post('/proyek', 'ProjectsController@store');
    Route::delete('/proyek/{project}', 'ProjectsController@destroy')->name('deleteproject');
    Route::get('/proyek/{project}/edit', 'ProjectsController@edit');
    Route::patch('/proyek/{project}', 'ProjectsController@update');
    Route::get('/proyek/download', 'ProjectsController@pdf')->name('printproject');

    // Route Progres
    Route::get('/progres', 'ProgressesController@index')->name('progress');
    Route::get('/progres/{progress}', 'ProgressesController@show');
    Route::get('/progres/{progress}/tambah', 'ProgressesController@create');
    Route::post('/progres', 'ProgressesController@store');
    Route::get('/progres/{progress}/laporan', 'ProgressesController@laporan')->name('progressreport');

});