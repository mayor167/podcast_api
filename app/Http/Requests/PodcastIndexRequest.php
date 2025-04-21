<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PodcastIndexRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'nullable|exists:categories,id',
            'sort_by' => 'nullable|in:title,created_at',
            'sort_direction' => 'nullable|in:asc,desc',
        ];
    }
}