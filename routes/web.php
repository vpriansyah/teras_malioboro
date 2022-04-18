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

//Pedagang
Route::get('/pedagang', function () {
    return view('/pedagang/dashboard');
});

Route::get('/login', function () {
    return view('/pedagang/login');
});

Route::get('/daftar', function () {
    return view('/pedagang/daftar');
});

Route::get('/saran', function () {
    return view('/pedagang/saran');
});

Route::get('/statistik', function () {
    return view('/pedagang/statistik');
});

Route::get('/agenda', function () {
    return view('/pedagang/agenda');
});

Route::get('/informasi', function () {
    return view('/pedagang/informasipenting');
});

//Publik
Route::get('/publik/', function () {
    return view('publik/index');
});

