<?php

namespace App\Http\Controllers;

use App\Http\Resources\FavoriteCategoryCollection;
use App\Http\Resources\RecordCollection;
use App\Models\FavoriteCategory;
use App\Models\Record;
use App\Http\Resources\FavoriteCategory as FavoriteCategoryResource;
use Illuminate\Http\Request;

class FavoriteCategoryController extends Controller
{
    public function index()
    {
        return response()->json(new FavoriteCategoryCollection(FavoriteCategory::all()), 200);
    }

    public function show(FavoriteCategory $favoriteCategory)
    {
        return response()->json(new FavoriteCategoryResource($favoriteCategory), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'folder_name' => 'required|unique:favorite_categories|max:255|string'
        ]);

        return response()->json(FavoriteCategory::create($request->all()), 201);
    }

    public function updateFolder(FavoriteCategory $favoriteCategory, Request $request)
    {
        $request->validate([
            'folder_name' => 'required|unique:favorite_categories|max:255|string'
        ]);

        $favoriteCategory->update($request->all());
        return response()->json(new FavoriteCategoryResource($favoriteCategory), 200);
    }

    public function indexFavoritesByCategory(FavoriteCategory $favoriteCategory)
    {
        //$records = ->where('favorite', 1)->where('archived', 0)->get();
        return response()->json(new RecordCollection($favoriteCategory->records), 200);
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
