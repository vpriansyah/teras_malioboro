<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublikController;
use App\Http\Controllers\StatistikPublikController;

use App\Http\Controllers\LoginController;

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

//Auth
// Route::get('auth/login', [LoginController::class, 'index']);
// Route::post('auth/login', [LoginController::class, 'authenticate']);
$ctrl = '\App\Http\Controllers';
Route::get('/auth/login', $ctrl . '\LoginController@index')->name('/auth/login');
Route::post('/auth/login', $ctrl . '\LoginController@authenticate')->name('auth.login');
Route::middleware('auth')->get('/', function () {
    return "Berhasil Login";
})->name('/pedagang');

//Pedagang
Route::get('/pedagang', function () {
    return view('/pedagang/dashboard');
});

Route::get('pedagang/daftar', function () {
    return view('/pedagang/daftar');
});

Route::get('pedagang/saran', function () {
    return view('/pedagang/saran');
});
Route::get('pedagang/profil', 'App\Http\Controllers\ProfilController@index');
// Route::get('pedagang/profil', function () {
//     return view('/pedagang/profil', [
//         "nama" => "Christya Ayu Dewi",
//         "sebagai" => "Pedagang",
//         "status" => "Aktif",

//     ]);
// });

Route::get('pedagang/statistik', function () {
    return view('/pedagang/statistik');
});

Route::get('pedagang/agenda', function () {
    return view('/pedagang/agenda');
});

Route::get('pedagang/informasi', function () {
    return view('/pedagang/informasi');
});

//Publik
Route::get('/', [PublikController::class, 'index']);
Route::get('/publik', [PublikController::class, 'index']);

Route::get('/publik/selfassessment', function () {
    return view('/publik/selfassessment');
});

//Route::get('/publik/galeri', function () {
//    return view('/publik/galeri');
//});

Route::get('/publik/galeri', 'App\Http\Controllers\GaleriController@index');
Route::get('/publik/galeri-data/{id}', 'App\Http\Controllers\GaleriController@data');

Route::get('/publik/aduansaran', 'App\Http\Controllers\AduanController@index');
Route::post('/publik/tambah', 'App\Http\Controllers\AduanController@tambah');

Route::get('/publik/agenda', 'App\Http\Controllers\AgendaController@index');

Route::get('/publik/cctv', function () {
    return view('/publik/cctv');
});

Route::get('/publik/statistik', [StatistikPublikController::class, 'index']);
// Route::get('/publik/statistik', function () {
//     return view('/publik/statistik');
// });

