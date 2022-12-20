<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;


Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{article}/show', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/{category}/index', [ArticleController::class, 'articles_by_category'])->name('articles.category');

Route::get('/word-with-us', [PublicController::class, 'workWithUs'])->name('work.with.us');

Route::post('/user/send-role-request', [PublicController::class, 'sendRoleRequest'])->name('user.role.request');

Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/{user}/set-revisor', [AdminController::class, 'makeUserRevisor'])->name('admin.makeUserRevisor');
    Route::get('/admin/{user}/set-admin', [AdminController::class, 'makeUserAdmin'])->name('admin.makeUserAdmin');
    Route::get('/admin/{user}/set-writer', [AdminController::class, 'makeUserWriter'])->name('admin.makeUserWriter');
    Route::post('/tag/store', [AdminController::class, 'storeTag'])->name('tag.store');
    Route::post('/category/{category}/update', [AdminController::class, 'editCategory'])->name('category.edit');
    Route::post('/category/store', [AdminController::class, 'storeCategory'])->name('category.store');
    Route::delete('/category/{category}/delete', [AdminController::class, 'deleteCategory'])->name('category.delete');
});

Route::middleware('writer')->group(function(){
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/article/dashboard', [ArticleController::class, 'articleDashboard'])->name('articles.dashboard');
    Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/{article}/update', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/{article}/delete', [ArticleController::class, 'destroy'])->name('article.delete');
});

Route::middleware('revisor')->group(function(){
    Route::get('/revisor/dashboard', [RevisorController::class, 'revisorDashboard'])->name('revisor.dashboard');
    Route::get('/revisor/article/{article}/detail', [RevisorController::class, 'articleDetail'])->name('revisor.detail');
    Route::get('/revisor/article/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.accept');
    Route::get('/revisor/article/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.reject');
});

Route::get('/article/search', [PublicController::class, 'searchArticle'])->name('search.articles');

Route::post('/tag/{tag}/update', [AdminController::class, 'editTag'])->name('tag.edit');
Route::delete('/tag/{tag}/delete', [AdminController::class, 'deleteTag'])->name('tag.delete');

