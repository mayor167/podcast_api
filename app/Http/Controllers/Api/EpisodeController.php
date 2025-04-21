<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Http\Resources\EpisodeResource;

class EpisodeController extends Controller
{
    public function show(Episode $episode)
    {
        $episode->load('podcast');
        return new EpisodeResource($episode);
    }
}