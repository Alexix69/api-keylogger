<?php

namespace App\Http\Controllers;

use App\Models\FavoriteCategory;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        return response()->json(Record::where('archived', 0)->get());
    }

    public function indexKeystrokes()
    {

        return response()->json(Record::where('type', 'keystroke')->get());
    }

    public function indexScreenshots()
    {
        return response()->json(Record::where('type', 'screenshot')->get());
    }

    public function indexWebsites()
    {
        return response()->json(Record::where('type', 'website')->get());
    }

    public function indexArchivedRecords()
    {
        // ->where('favorite', 0)->where('favorite_category_id', null)
        return response()->json(Record::where('archived', 1)->where('favorite', 0)->where('favorite_category_id', null)->get());
    }

    public function indexFavoriteRecords()
    {
        //$favoriteRecords  =
        return response()->json(Record::where('favorite', 1)->where('archived', 0)->where('favorite_category_id', null)->get());
    }


    public function show(Record $record)
    {
        return response()->json($record, 200);
    }

    public function store(Request $request)
    {
        return response()->json(Record::create($request->all()), 201);
    }

    public function handleArchivedStatus(Record $record)
    {
        if ($record->archived === 0) {
            $record->archived = 1;
            $record->favorite_category_id = null;
            $record->favorite = 0;
        } else {
            $record->archived = 0;
        }

        $record->save();
        return response()->json($record, 200);
    }

    public function handleFavoriteStatus(Record $record)
    {
        if ($record->favorite === 0) {
            $record->favorite = 1;
            $record->archived = 0;
        } else {
            $record->favorite = 0;
            $record->favorite_category_id = null;
        }
        $record->save();
        return response()->json($record, 200);
    }

    public function assignFavoriteToCategory(Record $record, Request $request)
    {
        $record->favorite_category_id = $request->favorite_category_id;
        $record->favorite = 1;
        $record->archived = 0;
        $record->save();
        return response()->json($record, 200);
    }

    public function removeFavoriteFromCategory(FavoriteCategory $favoriteCategory, Record $record)
    {
        $favoriteCategory->records()->where('id', $record->id)->update(['favorite_category_id' => null]);
        return response()->json(null, 204);
    }
}
