<?php

use App\Http\Controllers\Api\V1\LessonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
   Route::apiResource('lessons', LessonController::class);
});
