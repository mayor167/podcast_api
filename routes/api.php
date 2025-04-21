<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PodcastController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EpisodeController;

Route::get('/podcasts', [PodcastController::class, 'index']);
Route::get('/podcasts/{podcast}', [PodcastController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::get('/episodes/{episode}', [EpisodeController::class, 'show']);