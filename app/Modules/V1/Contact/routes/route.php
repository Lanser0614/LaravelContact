<?php

use App\Modules\V1\Contact\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::prefix('/contact')->middleware("api")->namespace('contact-v1')->group(function () {
    Route::get('/', [ContactController::class,'all'])->name('all');
    Route::get('/{id?}', [ContactController::class,'show'])->name('show');
    Route::post('/', [ContactController::class,'create'])->name('create');
    Route::put('/{id?}', [ContactController::class,'updateContent'])->name('updateContent');
    Route::delete('/{id?}', [ContactController::class,'delete'])->name('delete');
});

