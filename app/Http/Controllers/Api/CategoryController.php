<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(10);
        return new CategoryCollection($categories);
    }

    public function show(Category $category)
    {
        $category->load('podcasts');
        return new CategoryResource($category);
    }
}