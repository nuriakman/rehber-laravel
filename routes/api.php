<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BirimController;
use App\Http\Controllers\UnvanController;

// REST API resource routes
Route::apiResource('birimler', BirimController::class)
    ->parameters(['birimler' => 'birim']);

Route::apiResource('unvanlar', UnvanController::class)
    ->parameters(['unvanlar' => 'unvan']);
