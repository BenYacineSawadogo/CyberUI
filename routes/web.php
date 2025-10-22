<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlerteController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IncidentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Publications Routes
Route::get('/alertes', [AlerteController::class, 'index'])->name('alertes.index');
Route::get('/alertes/{id}', [AlerteController::class, 'show'])->name('alertes.show');

Route::get('/rapports', [RapportController::class, 'index'])->name('rapports.index');
Route::get('/rapports/{id}', [RapportController::class, 'show'])->name('rapports.show');

Route::get('/bulletins', [BulletinController::class, 'index'])->name('bulletins.index');
Route::get('/bulletins/{id}', [BulletinController::class, 'show'])->name('bulletins.show');

// Documentation Route
Route::get('/documentation', [DocumentationController::class, 'index'])->name('documentation.index');

// Contact Route
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// Incident Declaration Routes
Route::get('/declarer-incident', [IncidentController::class, 'create'])->name('incident.create');
Route::post('/declarer-incident', [IncidentController::class, 'store'])->name('incident.store');
