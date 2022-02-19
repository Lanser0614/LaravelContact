<?php

use App\Modules\V1\Phone\Http\Controllers\PhoneController;
use Illuminate\Support\Facades\Route;

Route::prefix('/phone')->middleware("api")->namespace('phone-v1')->group(function () {
    Route::get('/', [PhoneController::class,'all'])->name('all');
    Route::get('/{id?}', [PhoneController::class,'show'])->name('show');
    Route::post('/', [PhoneController::class,'create'])->name('create');
    Route::put('/{id?}', [PhoneController::class,'updateContent'])->name('updateContent');
    Route::delete('/{id?}', [PhoneController::class,'delete'])->name('delete');
});

