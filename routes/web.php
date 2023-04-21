<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CourseController, UserController, EngineeringtaskController, NewspostController};

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

Route::get('/home', [NewspostController::class, 'home', EngineeringtaskController::class, 'home'])->name('home');
Route::get('/news', [NewspostController::class, 'news'])->name('news');
Route::get('/news/{id}', [NewspostController::class, 'single'])->name('news.single');
Route::get('/engineering', [EngineeringtaskController::class, 'index'])->name('engineering');
Route::get('/engineering/{id}', [EngineeringtaskController::class,'single'])->name('engineeringtask.single');