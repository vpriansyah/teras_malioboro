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
Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/daftar', function () {
    return view('daftar');
});

Route::get('/saran', function () {
    return view('saran');
});

Route::get('/statistik', function () {
    return view('statistik');
});

Route::get('/agenda', function () {
    return view('agenda');
});

Route::get('/informasi', function () {
    return view('informasipenting');
});

//Publik
Route::get('/publik/', function () {
    return view('publik/index');
});

