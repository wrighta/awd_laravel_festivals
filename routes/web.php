<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\FestivalController as AdminFestivalController;
use App\Http\Controllers\User\FestivalController as UserFestivalController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');

Route::get('/user/festivals/', [UserFestivalController::class, 'index'])->name('user.festivals.index');
Route::get('/user/festivals/{id}', [UserFestivalController::class, 'show'])->name('user.festivals.show');

Route::get('/admin/festivals/', [AdminFestivalController::class, 'index'])->name('admin.festivals.index');
Route::get('/admin/festivals/create', [AdminFestivalController::class, 'create'])->name('admin.festivals.create');
Route::get('/admin/festivals/{id}', [AdminFestivalController::class, 'show'])->name('admin.festivals.show');
Route::post('/admin/festivals/store', [AdminFestivalController::class, 'store'])->name('admin.festivals.store');
Route::get('/admin/festivals/{id}/edit', [AdminFestivalController::class, 'edit'])->name('admin.festivals.edit');
Route::put('/admin/festivals/{id}', [AdminFestivalController::class, 'update'])->name('admin.festivals.update');
Route::delete('/admin/festivals/{id}', [AdminFestivalController::class, 'destroy'])->name('admin.festivals.destroy');

