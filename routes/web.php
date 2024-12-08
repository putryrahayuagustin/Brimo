<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\userController;
use App\Models\nasabah;
use App\Models\Rekening;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::get('/nasabah', function () {

//     $nasabah = nasabah::where('user_id', Auth::id())->first();

//     return view('nasabah', compact('nasabah'));

// })->name('nasabah.index');

Route::get('/rekening', function () {
    $rekening = Rekening::where('user_id', Auth::id())->first();

    return view('rekening', compact('rekening'));
})->name('rekening.index');

Route::get('/addnasabah', function () {
    return view('form.addnasabah');
})->name('addnasabah.index');

Route::get('/addrekening', function () {
    return view('form.addrekening');
})->name('addrekening.index');

Route::post('login.form' , [userController::class,'login'])->name('login.form');
Route::post('register.form' , [userController::class,'register'])->name('register.form');

Route::post('addnasabah' , [NasabahController::class,'store'])->name('nasabah.store');

Route::post('logout' , [userController::class,'destroy'])->name('logout');

Route::get('/nasabah', [NasabahController::class, 'index'])->name('nasabah.index');

Route::get('/nasabah/edit/{id}', [NasabahController::class, 'edit'])->name('nasabah.edit');

// Update Nasabah
Route::put('/nasabah/{id}', [NasabahController::class, 'update'])->name('nasabah.update');

// Hapus Nasabah
Route::delete('/nasabah/{id}', [NasabahController::class, 'destroy'])->name('nasabah.destroy');


Route::post('/rekening', [RekeningController::class, 'store'])->name('rekening.store');

Route::get('/rekening/{id}/edit', [RekeningController::class, 'edit'])->name('rekening.edit');

// Route untuk memperbarui rekening
Route::put('/rekening/{id}', [RekeningController::class, 'update'])->name('rekening.update');
Route::delete('/rekening/{id}', [RekeningController::class, 'destroy'])->name('rekening.destroy');

Route::resource("transaksi", TransaksiController::class);