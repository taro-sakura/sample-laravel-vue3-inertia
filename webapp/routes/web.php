<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TranslateController;

Route::get('/', [StaticController::class, 'index'])->name('static.index');

Route::resource('news', NewsController::class)->except(['store', 'update']);
Route::post('news/create', [NewsController::class, 'store'])->name('news.store');
Route::put('news/{news}/edit', [NewsController::class, 'update'])->name('news.update');

Route::get('translate', [TranslateController::class, 'index'])->name('translate.index');
Route::post('translate/execute', [TranslateController::class, 'execute'])->name('translate.execute');
Route::post('translate/reverse', [TranslateController::class, 'reverse'])->name('translate.reverse');
