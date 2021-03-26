<?php

use App\Autor;
use Illuminate\Http\Request;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RubricController;

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

Route::prefix('authors')->middleware('auth:api')->group(function () {

    Route::get('/', [AuthorController::class, 'getAll']);
    Route::get('/{id}', [AuthorController::class, 'get']);
    Route::get('/{id}/books', [AuthorController::class, 'getAutorBooks']);
    Route::post('/', [AuthorController::class, 'create'])->middleware('check.user');
    Route::post('/{id}', [AuthorController::class, 'edit'])->middleware('check.user');
    Route::delete('/{id}', [AuthorController::class, 'delete'])->middleware('check.user');

});

Route::prefix('books')->middleware('auth:api')->group(function () {

    Route::get('/', [BookController::class, 'getAll']);
    Route::get('/{id}', [BookController::class, 'get']);
    Route::get('/{id}/authors', [BookController::class, 'getBookAuthors']);
    Route::get('/{id}/rubrics', [BookController::class, 'getBookRubrics']);
    Route::post('/', [BookController::class, 'create'])->middleware('check.user');
    Route::post('/{id}', [BookController::class, 'edit'])->middleware('check.user');
    Route::delete('/{id}', [BookController::class, 'delete'])->middleware('check.user');

});

Route::prefix('rubrics')->middleware('auth:api')->group(function () {


    Route::get('/', [RubricController::class, 'getAll']);
    Route::get('/{id}', [RubricController::class, 'get']);
    Route::get('/{id}/books', [RubricController::class, 'getRubricBooks']);
    Route::post('/', [RubricController::class, 'create'])->middleware('check.user');
    Route::post('/{id}', [RubricController::class, 'edit'])->middleware('check.user');
    Route::delete('/{id}', [RubricController::class, 'delete'])->middleware('check.user');

});

Route::get('/login', function (Request $request) {})->name('login');