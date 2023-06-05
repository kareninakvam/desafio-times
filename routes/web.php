<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;


Route::get('/', [ResourceController::class, 'welcome']);
Route::post('/clientes/placas', [ResourceController::class, 'consultaPorFinalPlaca']);



