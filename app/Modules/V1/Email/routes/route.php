<?php

use App\Modules\V1\Email\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::prefix('/email')->middleware("api")->namespace('email-v1')->group(function () {
    Route::get('/', [EmailController::class,'all'])->name('all');
    Route::get('/{id?}', [EmailController::class,'show'])->name('show');
    Route::post('/', [EmailController::class,'create'])->name('create');
    Route::put('/{id?}', [EmailController::class,'updateContent'])->name('updateContent');
    Route::delete('/{id?}', [EmailController::class,'delete'])->name('delete');
});

