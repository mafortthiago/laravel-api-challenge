<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;

    Route::get('bands', [BandController::class, 'getAll']);
    Route::get('bands/{id}', [BandController::class, 'getById']);
    Route::get('bands/gender/{id}',[BandController::class,'getByGender']);
