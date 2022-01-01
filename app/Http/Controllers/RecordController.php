<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecordCollection;
use App\Models\FavoriteCategory;
use App\Models\Record;
use App\Http\Resources\Record as RecordResource;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        return response()->json(new RecordCollection(Record::where('archived', 0)->get()), 200);
    }

    public function indexKeystrokes()
    {

        return response()->json(new RecordCollection(Record::where('type', 'keystroke')->get()), 200);
    }

    public function indexScreenshots()
    {
        return response()->json(new RecordCollection(Record::where('type', 'screenshot')->get()), 200);
    }

    public function indexWebsites()
    {
        return response()->json(new RecordCollection(Record::where('type', 'website')->get()), 200);
    }

    public function indexArchivedRecords()
    {
        // ->where('favorite', 0)->where('favorite_category_id', null)
        return response()->json(new RecordCollection(Record::where('archived', 1)->where('favorite', 0)->where('favorite_category_id', null)->get()), 200);
    }

    public function indexFavoriteRecords()
    {
        //$favoriteRecords  =
        return response()->json(new RecordCollection(Record::where('favorite', 1)->where('archived', 0)->where('favorite_category_id', null)->get()), 200);
    }


    public function show(Record $record)
    {
        return response()->json(new RecordResource($record), 200);
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
        return response()->json(new RecordResource($record), 200);
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
        return response()->json(new RecordResource($record), 200);
    }

//    public function assignFavoriteToCategory(Record $record, Request $request)
//    {
//        $record->favorite_category_id = $request->favorite_category_id;
//        $record->favorite = 1;
//        $record->archived = 0;
//        $record->save();
//        return response()->json(new RecordResource($record), 200);
//    }

    public function assignFavoriteToCategory(FavoriteCategory $favoriteCategory, Record $record)
    {
        //$record->favorite_category_id = $favoriteCategory->id;
        $record->favorite = 1;
        $record->archived = 0;
        //$record->save();
        $favoriteCategory->records()->save($record);
        return response()->json(new RecordResource($record), 200);
    }

    public function removeFavoriteFromCategory(FavoriteCategory $favoriteCategory, Record $record)
    {
        $favoriteCategory->records()->where('id', $record->id)->update(['favorite_category_id' => null]);
        return response()->json(null, 204);
    }

    public function image(Record $record){
        return response()->download($record->content);
    }
}
