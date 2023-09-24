<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
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

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
        Route::resource('projects',ProjectController::class);
        Route::get('/projects',[ProjectController::class,'index'])->name('projects');
        Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
        Route::resource('types',TypeController::class);
        Route::get('/types',[TypeController::class,'index'])->name('types');
        Route::get('/types/{id}', [TypeController::class, 'show'])->name('types.show');
        Route::get('/types/create', [TypeController::class, 'create'])->name('types.create');
        Route::post('/types', [TypeController::class, 'store'])->name('types.store');
        Route::get('/types/{id}/edit', [TypeController::class, 'edit'])->name('types.edit');
        Route::put('/types/{id}', [TypeController::class, 'update'])->name('types.update');
        Route::delete('/types/{id}', [TypeController::class, 'destroy'])->name('types.destroy');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
