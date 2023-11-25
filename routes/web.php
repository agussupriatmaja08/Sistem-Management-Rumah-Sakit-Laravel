<?php

use App\Http\Controllers\controllers;
use Faker\Provider\Lorem;
use Illuminate\Support\Facades\Route;
use App\Models\artikel;
use App\Http\Controllers\loginAdmin;
use App\Http\Controllers\inapControllers;





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


Route::get('/home', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});
Route::get('/welcome', function () {
    return view('welcome', [
        "title" => "Welcome"
    ]);
});

Route::get('/agus', function () {
    return view('agus', [
        "title" => "Agus"
    ]);
});
Route::get('/about2', function () {
    return 'halaman about';
});
Route::get('/cetak', function () {
    return  view('cetakRujukan');
});


//Menggunakan controlers
Route::get('/post', [controllers::class, 'artikel']);
Route::get('/post/{slug}', [controllers::class, 'artikel2' ]);


//login dan logout

Route::get('/', [loginAdmin::class, 'loginAdmin']);
Route::post('/login/validasi', [loginAdmin::class, 'validasi']);
Route::get('/logout', [loginAdmin::class, 'logout']);



//Pasein
Route::get('/pasien', [controllers::class, 'pasien']);
Route::get('/pasien/detail/{slug}', [controllers::class, 'detailPasien']);
Route::get('/addPasien', [controllers::class, "addPasien"]);
Route::post('/formPasien/savePasien', [controllers::class, "savePasien"]);
Route::get('/pasien/hapus/{slug}', [controllers::class, 'hapusPasien']);
Route::get('/pasien/ubah/{slug}', [controllers::class, 'tampilPasien']);
Route::post('/pasien/ubahPasien', [controllers::class, "ubahPasien"]);
Route::post('/searchPasien', [controllers::class,  'pasien']);


//medis
Route::get('/medis', [controllers::class, 'medis']);
Route::get('/addMedis', [controllers::class, "formMedis"]);
Route::post('/saveDataMedis', [controllers::class, "addMedis"]);
Route::post('/searchMedis', [controllers::class, 'medis']);
Route::get('/hapusMedis/{slug}', [controllers::class, 'hapusMedis']);
Route::get('/editMedis/{slug}', [controllers::class, 'editMedis']);
Route::post('/saveMedis', [controllers::class, 'saveMedis']);

//ruangan
Route::get('/ruangan', [controllers::class, 'ruangan']);
Route::get('/formRuangan', [controllers::class, "formRuangan"]);
Route::post('/saveRuangan', [controllers::class, "saveRuangan"]);
Route::post('/searchRuangan', [controllers::class, 'ruangan']);

//inap

Route::get('/inap', [inapControllers::class, 'inap']);
Route::get('inap/hapus/{slug}', [inapControllers::class , 'hapusInap']);
Route::get('/tambahInap', [inapControllers::class, 'tambahInap']);
Route::get('/formInap/{slug}', [inapControllers::class, 'formInap']);
Route::post('/kirimRuanganInap/{slug}', [inapControllers::class, 'saveInap']);
Route::post('/searchInap', [inapControllers::class, 'inap']);
//rujukan 
Route::get('/rujukan', [controllers::class, "rujukan"]);
Route::get('/formRujukan/{slug}', [controllers::class, 'formRujukan']);
Route::post('/kirimRujukan/{slug}', [controllers::class, 'simpanRujukan']);
Route::get('/cetakRujukan', [controllers::class, 'cetakRujukan']);

//about
Route::get('/about', [controllers::class, "about"]);


Route::get("/tes", [controllers::class,"a"]);


