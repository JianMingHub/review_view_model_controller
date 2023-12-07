<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\HomeController;
use App\Http\Controllers\site\CategoryController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// this is category

Route::get('category', [CategoryController::class, 'index'])->name('category.index');

Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');

Route::post('category/create', [CategoryController::class, 'store'])->name('category.store');

Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');

Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

Route::get('category/{slugCate}/{id}', [CategoryController::class, 'show'])->name('category.show');