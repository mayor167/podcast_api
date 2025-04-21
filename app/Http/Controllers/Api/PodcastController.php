<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use App\Http\Resources\PodcastResource;
use App\Http\Resources\PodcastCollection;
use App\Http\Requests\PodcastIndexRequest;

class PodcastController extends Controller
{
    public function index(PodcastIndexRequest $request)
    {
        $query = Podcast::with('category')->orderBy('created_at', 'desc');

        // Filtering by category
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Sorting
        if ($request->has('sort_by')) {
            $query->orderBy($request->sort_by, $request->sort_direction ?? 'asc');
        }

        // Pagination
        $podcasts = $query->paginate(10);

        return new PodcastCollection($podcasts);
    }

    public function show(Podcast $podcast)
    {
        $podcast->load('category', 'episodes');
        return new PodcastResource($podcast);
    }
}