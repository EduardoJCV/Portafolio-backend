<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/panel-admin', [App\Http\Controllers\HomeController::class, 'panel'])->name('home.panel');


Route::middleware('auth')->get('/panel-admin/projects', [App\Http\Controllers\ProjectController::class, 'view'])->name('projects.view');
Route::middleware('auth')->get('/panel-admin/projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create');
Route::middleware('auth')->post('/panel-admin/projects/create', [App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store');
Route::middleware('auth')->get('/panel-admin/projects/edit/{id}', [App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
Route::middleware('auth')->get('/panel-admin/projects/destroy/{id}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.destroy');
Route::middleware('auth')->patch('/panel-admin/projects/update/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');



Route::middleware('auth')->get('/panel-admin/skills', [App\Http\Controllers\SkillController::class, 'view'])->name('skills.view');
Route::middleware('auth')->get('/panel-admin/skill/create', [App\Http\Controllers\SkillController::class, 'create'])->name('skill.create');
Route::middleware('auth')->post('/panel-admin/skill/create', [App\Http\Controllers\SkillController::class, 'store'])->name('skill.store');
Route::middleware('auth')->get('/panel-admin/skill/destroy/{id}', [App\Http\Controllers\SkillController::class, 'destroy'])->name('skill.destroy');
Route::middleware('auth')->get('/panel-admin/skill/edit/{id}', [App\Http\Controllers\SkillController::class, 'edit'])->name('skill.edit');
Route::middleware('auth')->patch('/panel-admin/skill/update/{skillslist}', [App\Http\Controllers\SkillController::class, 'update'])->name('skill.update');


Route::middleware('auth')->get('/panel-admin/skills-list/create', [App\Http\Controllers\SkillsListController::class, 'create'])->name('skills-list.create');
Route::middleware('auth')->post('/panel-admin/skills-list/create', [App\Http\Controllers\SkillsListController::class, 'store'])->name('skills-list.store');
Route::middleware('auth')->get('/panel-admin/skills-list/edit/{id}', [App\Http\Controllers\SkillsListController::class, 'edit'])->name('skills-list.edit');
Route::middleware('auth')->get('/panel-admin/skills-list/destroy/{id}', [App\Http\Controllers\SkillsListController::class, 'destroy'])->name('skills-list.destroy');
Route::middleware('auth')->patch('/panel-admin/skills-list/update/{skillslist}', [App\Http\Controllers\SkillsListController::class, 'update'])->name('skills-list.update');


Route::middleware('auth')->get('/panel-admin/about', [App\Http\Controllers\AboutController::class, 'edit'])->name('about.edit');
Route::middleware('auth')->patch('/panel-admin/about/update/{id}', [App\Http\Controllers\AboutController::class, 'update'])->name('about.update');


Route::middleware('auth')->get('/panel-admin/message', [App\Http\Controllers\MessageController::class, 'index'])->name('message.index');
Route::middleware('auth')->get('/panel-admin/message/destroy/{id}', [App\Http\Controllers\MessageController::class, 'destroy'])->name('message.destroy');


Route::middleware('auth')->get('/panel-admin/article', [App\Http\Controllers\ArticleController::class, 'view'])->name('article.view');
Route::middleware('auth')->get('/panel-admin/article/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('article.create');
Route::middleware('auth')->post('/panel-admin/article/create', [App\Http\Controllers\ArticleController::class, 'store'])->name('article.store');
Route::middleware('auth')->get('/panel-admin/article/edit/{id}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('article.edit');
Route::middleware('auth')->get('/panel-admin/article/destroy/{id}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('article.destroy');
Route::middleware('auth')->patch('/panel-admin/article/update/{article}', [App\Http\Controllers\ArticleController::class, 'update'])->name('article.update');

// Route::middleware('auth')->get('/panel-admin/article-categories', [App\Http\Controllers\ArticleController::class, 'view'])->name('article.view');
Route::middleware('auth')->get('/panel-admin/article-categories/create', [App\Http\Controllers\ArticleCategoriesController::class, 'create'])->name('article-categories.create');
Route::middleware('auth')->post('/panel-admin/article-categories/create', [App\Http\Controllers\ArticleCategoriesController::class, 'store'])->name('article-categories.store');
Route::middleware('auth')->get('/panel-admin/article-categories/edit/{id}', [App\Http\Controllers\ArticleCategoriesController::class, 'edit'])->name('article-categories.edit');
Route::middleware('auth')->get('/panel-admin/article-categories/destroy/{id}', [App\Http\Controllers\ArticleCategoriesController::class, 'destroy'])->name('article-categories.destroy');
Route::middleware('auth')->patch('/panel-admin/article-categories/update/{article}', [App\Http\Controllers\ArticleCategoriesController::class, 'update'])->name('article-categories.update');

// Route::middleware('auth')->get('/panel-admin/article-tags', [App\Http\Controllers\ArticleController::class, 'view'])->name('article.view');
Route::middleware('auth')->get('/panel-admin/article-tags/create', [App\Http\Controllers\ArticleTagsController::class, 'create'])->name('article-tags.create');
Route::middleware('auth')->post('/panel-admin/article-tags/create', [App\Http\Controllers\ArticleTagsController::class, 'store'])->name('article-tags.store');
Route::middleware('auth')->get('/panel-admin/article-tags/edit/{id}', [App\Http\Controllers\ArticleTagsController::class, 'edit'])->name('article-tags.edit');
Route::middleware('auth')->get('/panel-admin/article-tags/destroy/{id}', [App\Http\Controllers\ArticleTagsController::class, 'destroy'])->name('article-tags.destroy');
Route::middleware('auth')->patch('/panel-admin/article-tags/update/{article}', [App\Http\Controllers\ArticleTagsController::class, 'update'])->name('article-tags.update');


// Route::get('/panel-admin/tag', [App\Http\Controllers\TagController::class, 'view'])->name('tag.view');
Route::middleware('auth')->get('/panel-admin/tag/create', [App\Http\Controllers\TagController::class, 'create'])->name('tag.create');
Route::middleware('auth')->post('/panel-admin/tag/create', [App\Http\Controllers\TagController::class, 'store'])->name('tag.store');
Route::middleware('auth')->get('/panel-admin/tag/edit/{id}', [App\Http\Controllers\TagController::class, 'edit'])->name('tag.edit');
Route::middleware('auth')->get('/panel-admin/tag/destroy/{id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('tag.destroy');
Route::middleware('auth')->patch('/panel-admin/tag/update/{tag}', [App\Http\Controllers\TagController::class, 'update'])->name('tag.update');


// Route::get('/panel-admin/category', [App\Http\Controllers\CategoryController::class, 'view'])->name('category.view');
Route::middleware('auth')->get('/panel-admin/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::middleware('auth')->post('/panel-admin/category/create', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::middleware('auth')->get('/panel-admin/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::middleware('auth')->get('/panel-admin/category/destroy/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
Route::middleware('auth')->patch('/panel-admin/category/update/{category}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
