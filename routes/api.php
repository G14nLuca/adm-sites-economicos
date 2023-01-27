<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AboutController;

Route::post('update/text', [AboutController::class, "updateText"]);
Route::post('update/img', [AboutController::class, "updateImg"]);