<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('books', [BookController::class, 'index']);

Route::post('book', [BookController::class, 'store']);

Route::put('books/{book}', [BookController::class, 'update']);

Route::delete('books/{book}', [BookController::class, 'delete']);

Route::post('author', [AuthorController::class, 'store']);
