<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect()->route('dashboard');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->name('dashboard');

Route::resource('products', ProductController::class);
Route::resource('sales', SaleController::class)->only(['index', 'create', 'store', 'destroy']);
Route::resource('categories', CategoryController::class);


Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('reports/pdf', [ReportController::class, 'exportPdf'])->name('reports.pdf');
Route::get('reports/csv', [ReportController::class, 'exportCsv'])->name('reports.csv');


