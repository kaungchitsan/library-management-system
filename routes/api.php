<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\GenreController;

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

Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    
    Route::middleware('auth:api', 'admin')->group(function () {

        Route::group(['prefix' => 'branches'], function () {
            Route::get('', [BranchController::class, 'index']);
            Route::get('/details', [BranchController::class, 'show']);
            Route::post('', [BranchController::class, 'store']);
            Route::post('/update', [BranchController::class, 'update']);
            Route::post('/delete', [BranchController::class, 'destroy']);
        });

        Route::group(['prefix' => 'genres'], function () {
            Route::get('', [GenreController::class, 'index']);
            Route::get('/details', [GenreController::class, 'show']);
            Route::post('', [GenreController::class, 'store']);
            Route::post('/update', [GenreController::class, 'update']);
            Route::post('/delete', [GenreController::class, 'destroy']);
        });

        Route::group(['prefix' => 'books'], function () {
            Route::get('/', [BookController::class, 'index']);
            Route::get('/details', [BookController::class, 'show']);
            Route::post('', [BookController::class, 'store']);
            Route::post('/update', [BookController::class, 'update']);
            Route::post('/delete', [BookController::class, 'destroy']);
            Route::get('/search', [BookController::class, 'search']);
        });

        Route::group(['prefix' => 'borrows'], function () {
            Route::get('', [BorrowingController::class, 'index']);
            Route::post('', [BorrowingController::class, 'borrow']);
            Route::post('/return', [BorrowingController::class, 'return']);
        });
        
        Route::get('', [BookController::class, 'index']);
        Route::post('/logout', [AuthController::class, 'logout']);

    });
});
