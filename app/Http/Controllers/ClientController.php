<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        return response()->json(Client::all());
    }

    public function indexActiveClients()
    {
        return response()->json(Client::where('is_active', 1)->get());
    }

    public function indexInactiveClients()
    {
        return response()->json(Client::where('is_active', 0)->get());
    }

    public function show(Client $client)
    {
        return response()->json($client, 201);
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
        return response()->json($client, 200);
    }
}
