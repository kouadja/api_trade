<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class clientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        if (count($clients) > 0) {
            return response($clients, 200);
        } else {
            return response(["message"=>"il n'y a pas de client"], 404);
        }
    }
    public function store(Request $request)
    {   //pour l instant j ai pas encore effectué la validation
        if ($request->ajax()) {
            $client = Client::create($request->all());
            // $client_id = $client->id;
            // $client_id->basket()->create();
            
            return response($client, 200);
        } else {
            return response(["message"=>"veillez ressayer après"], 500);
        }
    }
    public function show($id)
    {
        $client = Client::find($id);
        if ($client !== null) {
            return response($client, 200);
        } else {
            return response(["message"=>"utilisateur introuvable"], 404);
        }
    }
    public function update(Request $request, $id)
    {
    }
}
