<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){

        $categories = CategoryResource::collection(Category::all());
     
        return response()->json($categories);
    }

    public function show(Category $category)
    {
        return response()->json(CategoryResource::make($category));
    }
}
