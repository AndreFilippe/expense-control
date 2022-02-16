<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
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

Route::prefix('categories')->controller(CategoryController::class)->name('categories.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('{category}/edit', 'edit')->name('edit');
    Route::put('{category}/edit', 'update')->name('update');
    Route::delete('{category}/delete', 'delete')->name('delete');
});

Route::prefix('items')->controller(ItemController::class)->name('items.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('{item}/edit', 'edit')->name('edit');
    Route::put('{item}/edit', 'update')->name('update');
    Route::delete('{item}/delete', 'delete')->name('delete');
});
