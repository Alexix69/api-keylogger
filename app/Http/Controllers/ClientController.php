<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientCollection;
use App\Models\Client;
use App\Http\Resources\Client as ClientResource;
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
        if ($client->is_active === 0) {
            $client->is_active = 1;
        } else {
            $client->is_active = 0;
        }

        $client->save();
        return response()->json(new ClientResource($client), 200);
    }
}

