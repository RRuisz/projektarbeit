<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{IngredientController, InfoController, RecipeController, UserController, EngineeringtaskController, NewspostController, HandoverController, TaskcommentController};

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
})->name('welcome');
Route::post('/login', [Usercontroller::class, 'login'])->name('login');
Route::middleware('auth')->group(function () {
    Route::get('/logout', [Usercontroller::class, 'logout'])->name('logout');

Route::get('/home', [NewspostController::class, 'home', EngineeringtaskController::class, 'home'])->name('home');

Route::get('/news', [NewspostController::class, 'index'])->name('news');
Route::get('/news/new', [NewspostController::class, 'new'])->name('news.new');
Route::post('/news/new', [NewspostController::class, 'save'])->name('news.new');
Route::get('/news/{id}', [NewspostController::class, 'single'])->name('news.single');
Route::get('/news/{id}/delete', [NewspostController::class, 'delete'])->name('news.delete');
Route::get('/news/{id}/update', [NewspostController::class, 'update'])->name('news.update');
Route::post('/news/{id}/update', [NewspostController::class, 'updatesave'])->name('news.update');

Route::get('/engineering', [EngineeringtaskController::class, 'index'])->name('engineering');
Route::get('/engineering/new', [EngineeringtaskController::class, 'new'])->name('engineering.new');
Route::post('/engineering/new', [EngineeringtaskController::class, 'save'])->name('engineering.new');
Route::get('/engineering/{id}', [EngineeringtaskController::class,'single'])->name('engineeringtask.single');
Route::post('/engineering/{id}', [EngineeringtaskController::class,'update'])->name('engineeringtask.single');
Route::get('/engineering/{id}/edit', [EngineeringtaskController::class, 'edittask'])->name('engineeringtask.update');
Route::post('/engineering/{id}/edit', [EngineeringtaskController::class, 'editsave'])->name('engineeringtask.update');
Route::get('/engineering/{id}/delete', [EngineeringtaskController::class, 'delete'])->name('engineeringtask.delete');
Route::get('/comment/delete/{id}', [TaskcommentController::class, 'deleteComment'])->name('comment.delete');
Route::get('/engineering/open/{id}', [EngineeringtaskController::class, 'open'])->name('engineeringtask.open');

Route::get('/handover', [HandoverController::class, 'index'])->name('handover');
Route::get('/handover/new', [HandoverController::class, 'new'])->name('handover.new');
Route::post('/handover/new', [HandoverController::class, 'save'])->name('handover.new');
Route::get('/handover/{id}', [HandoverController::class, 'single'])->name('handover.single');
Route::get('/handover/{id}/delete', [HandoverController::class, 'delete'])->name('handover.delete');
Route::get('/handover/{id}/edit', [HandoverController::class, 'edit'])->name('handover.update');
Route::post('/handover/{id}/edit', [HandoverController::class, 'saveedit'])->name('handover.update');


Route::get('/admin/register', [UserController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [UserController::class, 'save'])->name('admin.save');
Route::get('/admin/change/{id}', [UserController::class, 'adminchange'])->name('admin.change');
Route::post('/admin/change/{id}', [UserController::class, 'adminsavechange'])->name('admin.savechange');
Route::get('/admin/all', [UserController::class, 'all'])->name('admin.all');
Route::get('/userpanel/{id}', [UserController::class, 'panel'])->name('user.panel');
Route::get('/userpanel/{id}/change', [UserController::class, 'change'])->name('user.change');
Route::get('/user/change', [UserController::class, 'update'])->name('user.update');
Route::get('/user/{id}', [UserController::class, 'singleuser'])->name('user.single');

Route::get('/informations', [InfoController::class, 'index'])->name('infos');
Route::get('/informations/{id}', [InfoController::class, 'category'])->name('info.cat')->where('id', '[0-9]+');
Route::get('/informations/recipe/new', [RecipeController::class, 'new'])->name('recipe.new');
Route::post('/informations/recipe/new', [RecipeController::class, 'save'])->name('recipe.new');
Route::get('/information/recipe/{id}', [RecipeController::class, 'single'])->name('recipe.single')->where('id', '[0-9]+');
Route::get('/informations/ingredients', [IngredientController::class, 'all'])->name('ingredient.all');
Route::get('/informations/ingredients/{id}', [IngredientController::class, 'single'])->name('ingredient.single')->where('id', '[0-9]+');
Route::get('/informations/ingredient/new', [IngredientController::class, 'new'])->name('ingredient.new');
Route::post('/informations/ingredient/new', [IngredientController::class, 'save'])->name('ingredient.new');
Route::get('/informations/users', [UserController::class, 'overview'])->name('user.all');
});