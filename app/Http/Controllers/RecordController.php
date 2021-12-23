<?php

namespace App\Http\Controllers;

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
        return response()->json(Record::where('archived', 1)->get());
    }

    public function indexFavoriteRecords()
    {
        return response()->json(Record::where('favorite', 1)->get());
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
        } else {
            $record->archived = 0;
        }
        $record->save();
        return response()->json($record, 200);
    }

}
