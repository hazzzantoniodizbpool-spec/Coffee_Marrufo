<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeshopController;

Route::post('/venta/save',[CoffeshopController::class, 'guardar_orden']);


?>