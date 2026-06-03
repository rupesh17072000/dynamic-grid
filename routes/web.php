<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RecordController;

    Route::get('/',[RecordController::class,'index']);
    Route::get('/records/filter',[RecordController::class,'filter']);
    Route::get('/record/details/{id}',[RecordController::class,'details']);
    Route::post('/save-config',[RecordController::class,'saveConfiguration']);
    Route::get('/download-excel',[RecordController::class,'downloadExcel']);