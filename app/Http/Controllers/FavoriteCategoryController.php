<?php

namespace App\Http\Controllers;

use App\Models\FavoriteCategory;
use Illuminate\Http\Request;

class FavoriteCategoryController extends Controller
{
    public function index()
    {
        return response()->json(FavoriteCategory::all());
    }

    public function show(FavoriteCategory $favoriteCategory)
    {
        return response()->json($favoriteCategory, 200);
    }

    public function store(Request $request)
    {
        return response()->json(FavoriteCategory::create($request->all()), 201);
    }

    public function updateFolder(Request $request, FavoriteCategory $favoriteCategory)
    {
        $favoriteCategory->update($request->all());
        return response()->json($favoriteCategory, 200);
    }

    public function deleteCategory(FavoriteCategory $favoriteCategory)
    {
        $favoriteCategory->delete();
        return response()->json(null, 204);
    }
}
