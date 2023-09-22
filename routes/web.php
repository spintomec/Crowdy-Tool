<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\RemboursementController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Projets
    Route::get('/projets', [ProjetController::class, 'index'])->name('projets.index');
    Route::get('/projets/create', [ProjetController::class, 'create'])->name('projets.create');
    Route::post('/projets/store', [ProjetController::class, 'store'])->name('projets.store');
    Route::get('/projets/{projet}', [ProjetController::class, 'show'])->name('projets.show');
    Route::get('/projets/{projet}/edit', [ProjetController::class, 'edit'])->name('projets.edit');
    Route::put('/projets/{projet}', [ProjetController::class, 'update'])->name('projets.update');
    Route::delete('/projets/{projet}', [ProjetController::class, 'destroy'])->name('projets.destroy');

    // Remboursements
    Route::get('/remboursements', [RemboursementController::class, 'index'])->name('remboursements.index');
    Route::get('/remboursements/create/{projet_id}', [RemboursementController::class, 'create'])->name('remboursements.create');
    Route::post('/remboursements/store/{projet_id}', [RemboursementController::class, 'store'])->name('remboursements.store');
    Route::get('/remboursements/{remboursement}/edit', [RemboursementController::class, 'edit'])->name('remboursements.edit');
    Route::put('/remboursements/{remboursement}', [RemboursementController::class, 'update'])->name('remboursements.update');
    Route::delete('/remboursements/{remboursement}', [RemboursementController::class, 'destroy'])->name('remboursements.destroy');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
