<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientCollection;
use App\Models\Client;
use App\Http\Resources\Client as ClientResource;
use App\Http\Resources\RecordCollection;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(new ClientCollection(Client::all()), 200);
    }

    public function indexActiveClients()
    {
        return response()->json(new ClientCollection(Client::where('is_active', 1)->get()), 200);
    }

    public function indexInactiveClients()
    {
        return response()->json(new ClientCollection(Client::where('is_active', 0)->get()), 200);
    }

    public function show(Client $client)
    {
        return response()->json(new ClientResource($client), 201);
    }

    public function store(Request $request)
    {
        return response()->json(Client::create($request->all()), 201);
    }

    public function handleClientStatus(Client $client)
    {
        if ($client->is_active === false) {
            $client->is_active = true;
        } else {
            $client->is_active = false;
        }

        $client->save();
        return response()->json(new ClientResource($client), 200);
    }

//    public function keystrokesPerClient (Client $client){
//        $keystrokes = $client->records->where('type', 'keystroke')->count();
//        return response()->json($keystrokes, 200);
//    }
}

