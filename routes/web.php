<?php

use Illuminate\Support\Facades\{Route, Auth};

use App\Http\Controllers\{ChecklisttaskController, IngredientController, InfoController, RecipeController, UserController, EngineeringtaskController, NewspostController, HandoverController, TaskcategoryController, TaskcommentController, ChecklistController};
use GuzzleHttp\Middleware;

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
    if(Auth::user()){
        return redirect()->route('home');
    } else{
    return view('welcome');
    }
})->name('welcome');
Route::post('/login', [Usercontroller::class, 'login'])->name('login');
Route::middleware('auth')->group(function () {
    
    Route::get('/logout', [Usercontroller::class, 'logout'])->name('logout');
    Route::get('/home', [NewspostController::class, 'home', EngineeringtaskController::class, 'home'])->name('home');

    // NEWS ROUTES
    Route::get('/news', [NewspostController::class, 'index'])->name('news');
    Route::get('/news/new', [NewspostController::class, 'new'])->name('news.new');
    Route::post('/news/new', [NewspostController::class, 'save'])->name('news.new');
    Route::get('/news/{id}', [NewspostController::class, 'single'])->name('news.single');
    Route::get('/news/{id}/delete', [NewspostController::class, 'delete'])->name('news.delete');
    Route::get('/news/{id}/edit', [NewspostController::class, 'edit'])->name('news.update');
    Route::post('/news/{id}/edit', [NewspostController::class, 'saveedit'])->name('news.update');

    // ENGINEERING ROUTES
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

    // HANDOVER ROUTES
    Route::get('/handover', [HandoverController::class, 'index'])->name('handover');
    Route::get('/handover/new', [HandoverController::class, 'new'])->name('handover.new');
    Route::post('/handover/new', [HandoverController::class, 'save'])->name('handover.new');
    Route::get('/handover/{id}', [HandoverController::class, 'single'])->name('handover.single');
    Route::get('/handover/{id}/delete', [HandoverController::class, 'delete'])->name('handover.delete');
    Route::get('/handover/{id}/edit', [HandoverController::class, 'edit'])->name('handover.update');
    Route::post('/handover/{id}/edit', [HandoverController::class, 'saveedit'])->name('handover.update');

    //USER ROUTES
    Route::get('/userpanel/{id}', [UserController::class, 'panel'])->name('user.panel');
    Route::get('/userpanel/{id}/change', [UserController::class, 'change'])->name('user.change');
    Route::get('/user/change', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/{id}', [UserController::class, 'singleuser'])->name('user.single');
    Route::get('/user', [UserController::class, 'overview'])->name('user.all');

    // RECIPE ROUTES
    Route::get('/recipes', [InfoController::class, 'index'])->name('recipe.index');
    Route::get('/category/{id}', [InfoController::class, 'category'])->name('recipe.cat')->where('id', '[0-9]+');
    Route::get('/recipes/new', [RecipeController::class, 'new'])->name('recipe.new')->Middleware('checkRole');
    Route::post('/recipes/new', [RecipeController::class, 'save'])->name('recipe.new')->Middleware('checkRole');
    Route::get('//recipe/{id}', [RecipeController::class, 'single'])->name('recipe.single')->where('id', '[0-9]+');
    Route::get('/recipes/ingredients', [IngredientController::class, 'all'])->name('ingredient.all');
    Route::get('/recipes/ingredient/new', [IngredientController::class, 'new'])->name('ingredient.new')->Middleware('checkRole');
    Route::post('/recipes/ingredient/new', [IngredientController::class, 'save'])->name('ingredient.new')->Middleware('checkRole');

    // CHECKLIST ROUTES
    Route::get('/checklists', [ChecklistController::class, 'index'])->name('checklist');
    Route::get('/checklists/{id}', [ChecklistController::class, 'single'])->name('checklist.single')->where('id', '[0-9]+');
    Route::get('/checklists/tasks/new', [ChecklisttaskController::class, 'createtask'])->name('checklist.newtask')->Middleware('checkRole');
    Route::post('/checklists/tasks/new', [ChecklisttaskController::class, 'savetask'])->name('checklist.newtask')->Middleware('checkRole');
    Route::post('/checklists/tasks/update', [ChecklistController::class, 'updatestatus'])->name('checklist.taskstatus')->Middleware('checkRole');
    Route::get('/checklists/category/new', [TaskcategoryController::class, 'createcategory'])->name('checklist.newcategory')->Middleware('checkRole');
    Route::post('/checklists/category/new', [TaskcategoryController::class, 'savecategory'])->name('checklist.newcategory')->Middleware('checkRole');
    Route::get('/checklists/new',  [ChecklistController::class, 'newchecklist'])->name('checklist.new');
    Route::post('/checklist/category/tasks', [ChecklistController::class, 'tasksByCategory']);

    // ADMIN ROUTES
    
    Route::middleware('checkRole')->group(function () {
        Route::get('/admin', [UserController::class, 'admin'])->name('admin');
        Route::middleware('checkAdmin')->group(function () {
            Route::get('/admin/register', [UserController::class, 'register'])->name('admin.register');
            Route::post('/admin/register', [UserController::class, 'save'])->name('admin.save');
            Route::get('/admin/change/{id}', [UserController::class, 'adminchange'])->name('admin.change');
            Route::post('/admin/change/{id}', [UserController::class, 'adminsavechange'])->name('admin.savechange');
        });
        Route::get('/admin/all', [UserController::class, 'all'])->name('admin.all');
    });
});