<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(Client::where('is_active', 1)->get());
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
//COMPLETO HASTA IS_ACTIVE DE CLIENTE, AGREGAR FUNCIONALIDAD DE ACTIVAR Y DESACTIVAR
