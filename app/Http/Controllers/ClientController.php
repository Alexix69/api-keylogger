<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(Client::all());
    }

    public function show(Client $client)
    {
        return response()->json($client, 201);
    }

    public function delete(Client $client)
    {
        $client->delete();
        return response()->json(null, 204);
    }
}
