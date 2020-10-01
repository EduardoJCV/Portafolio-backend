<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//projects

Route::get('/projects/{limit}', [App\Http\Controllers\ProjectController::class, 'index'])->name('project');
Route::get('/project/{id}', [App\Http\Controllers\ProjectController::class, 'show'])->name('project.show');

//blog
Route::get('/articles/{limit}', [App\Http\Controllers\ArticleController::class, 'index'])->name('article');
Route::get('/article/{id}', [App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');


Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.show');


Route::get('/tags', [App\Http\Controllers\TagController::class, 'index'])->name('tag');
Route::get('/tag/{id}', [App\Http\Controllers\TagController::class, 'show'])->name('tag.show');

//about
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

//messages
Route::post('/message/store', [App\Http\Controllers\MessageController::class, 'store'])->name('message.store');


//skills
Route::get('/skill', [App\Http\Controllers\SkillController::class, 'index'])->name('skill');



Route::get('/skillslist', [App\Http\Controllers\SkillsListController::class, 'index'])->name('skillList');

