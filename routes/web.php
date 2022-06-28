<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

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

Route::get('/', [QuestionController::class, 'index'])->name('index');
Route::get('/create_question', [QuestionController::class, 'create'])->name('createQuestion');
Route::post('/create_question', [QuestionController::class, 'store'])->name('storeQuestion');
Route::get('/show_question/{id}', [QuestionController::class, 'show'])->name('showQuestion');
Route::get('/show_question/{id}/edit', [QuestionController::class, 'edit'])->name('editQuestion');
Route::post('/show_question/{id}/update', [QuestionController::class, 'update'])->name('updateQuestion');
Route::get('/delete_question/{id}', [QuestionController::class, 'destroy'])->name('deleteQuestion');
