<?php

namespace App\Http\Controllers;

use App\Models\FavoriteCategory;
use App\Models\Record;
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

    public function indexFavoritesByCategory(FavoriteCategory $favoriteCategory)
    {
        //$records = ->where('favorite', 1)->where('archived', 0)->get();
        return response()->json($favoriteCategory->records);
    }

    public function deleteCategoryOnly(FavoriteCategory $favoriteCategory)
    {
        $favoriteCategory->delete();
        return response()->json(null, 204);
    }

    public function deleteCategoryAndFavorites(FavoriteCategory $favoriteCategory)
    {
        Record::where('favorite_category_id', $favoriteCategory->id)->update(['favorite' => 0]);
        $favoriteCategory->delete();
        return response()->json(null, 204);
    }

}
