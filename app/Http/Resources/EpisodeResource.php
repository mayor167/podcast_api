<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EpisodeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'audio_url' => $this->audio_url,
            'duration' => $this->duration,
            'podcast' => new PodcastResource($this->whenLoaded('podcast')),
            'created_at' => $this->created_at->toIso8601String(),
        ];
    }
}