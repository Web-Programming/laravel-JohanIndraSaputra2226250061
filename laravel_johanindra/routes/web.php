<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//buat route ke halaman profil
Route::get("/profil", function () {
    return view('profil');
});

// Route::get("/mahasiswa/{nama}", function ($nama = "Johan") {
//     echo "<h1>Halo Nama Saya $nama<h1>";
// });

Route::get("/mahasiswa2/{nama?}", function ($nama = "Johan") {
    echo "<h1>Halo Nama Saya $nama<h1>";
});

Route::get("/profil/{nama?}/{pekerjaan?}", function ($nama = "Johan", $pekerjaan = "Mahasiswa") {
    echo "<h1>Halo Nama Saya $nama. Saya adalah $pekerjaan<h1>";
});

//redirect
Route::get("/hubungi", function () {
    echo "<h1>Hubungi Kami</h1>";
})->name("call");

Route::redirect("/contact", "/hubungi");

Route::get("/halo", function () {
    echo "<a href ='" . route('call') . "'>" . route('call') . "</a>";
});

Route::prefix("/dosen")->group(function () {
    Route::get("/jadwal", function () {
        echo "<h1>Jadwal Dosen</h1>";
    });
    Route::get("/materi", function () {
        echo "<h1>Materi Perkuliahan</h1>";
    });
});

Route::get('/dosen', function () {
    return view('dosen.');
});

Route::get('/dosen/index', function () {
    return view('dosen.index');
});

Route::get('/fakultas', function () {
    // return view('fakultas.index', ["ilkom" => "Fakultas Ilmu Komputer dan Rekayasa"]);
//     return view('fakultas.index', ["fakultas" => ["Fakultas Ilmu Komputer dan Rekayasa",
// "Fakultas Ilmu Ekonomi"]]);
//     return view('fakultas.index')->with("fakultas", ["Fakultas Ilmu Komputer dan Rekayasa",
// "Fakultas Ilmu Ekonomi"]);
// $fakultas = [];
    $kampus = "Universitas Multi Data Palembang";
    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
    return view('fakultas.index', compact('fakultas', 'kampus'));
});

Route::get('/prodi', [ProdiController::class, 'index']);

Route::resource("/kurikulum", KurikulumController::class);

Route::apiResource("/dosen", DosenController::class);

Route::get('/mahasiswa/insert', [MahasiswaController::class, 'insert']);
Route::get('/mahasiswa/update', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa/delete', [MahasiswaController::class, 'delete']);
Route::get('/mahasiswa/select', [MahasiswaController::class, 'select']);

Route::get('/mahasiswa/insert-elq', [MahasiswaController::class, 'insertElq']);
Route::get('/mahasiswa/update-elq', [MahasiswaController::class, 'updateElq']);
Route::get('/mahasiswa/delete-elq', [MahasiswaController::class, 'deleteElq']);
Route::get('/mahasiswa/select-elq', [MahasiswaController::class, 'selectElq']);

Route::get('/prodi/all-join-facade', [ProdiController::class, 'allJoinFacade']);

Route::get('/prodi/all-join-elq', [ProdiController::class, 'allJoinElq']);
Route::get('/mahasiswa/all-join-elq', [MahasiswaController::class, 'allJoinElq']);

Route::get('/prodi/create', [ProdiController::class,'create'])->name("prodi.create");
Route::post('prodi/store', [ProdiController::class,'store']);

Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
Route::get('/prodi/{prodi}', [ProdiController::class, 'show'])->name('prodi.show');

Route::get('/prodi/{prodi}/edit', [ProdiController::class, 'edit'])->name('prodi.edit');
Route::patch('/prodi/{prodi}', [ProdiController::class, 'update'])->name('prodi.update');

Route::delete('/prodi/{prodi}', [ProdiController::class, 'destroy'])->name('prodi.destroy');

