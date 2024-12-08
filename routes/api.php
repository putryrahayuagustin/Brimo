<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RekeningController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Rute untuk membuat rekening
    Route::post('rekening/create', [RekeningController::class, 'store']);
    Route::put('rekening/updateSaldo', [RekeningController::class, 'updateSaldo']);
    Route::delete('rekening/delete/{no_telepon}', [RekeningController::class, 'destroy']);
    Route::get('rekening/showRekening/{id}', [RekeningController::class, 'showAllMyRekening']);
    Route::post('rekening/kredit', [RekeningController::class, 'kredit']);



// });


Route::get('rekening/{rekening}', [RekeningController::class, 'findRekening']);
Route::post('transaksi', [TransactionController::class, 'transaction']);
