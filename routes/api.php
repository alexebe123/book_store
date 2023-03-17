<?php

use App\Http\Controllers\BooksStoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('create_book', [BooksStoreController::class, 'createBook']);
Route::get('get_books', [BooksStoreController::class, 'getBooks']);
Route::put('update_book', [BooksStoreController::class, 'updateBook']);
Route::put('delete_book', [BooksStoreController::class, 'deleteBook']);
