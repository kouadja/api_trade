<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class Sign_and_loginController extends Controller
{
    public function inscription(Request $request)
    {

        $validator = $request->validate([
            'name' => ['string', 'max:30', 'min:3'],
            "number" => ['numeric', 'min:8'],
            'email' => ['email',  'min:8', Rule::unique("clients", "client_email"), Rule::unique('admins', 'admin_email')],
            'password' => ['string', 'min:3']

        ]);
        if (!$validator) {
            return response(['message' => 'Erreur de validation'], 422);
        }
        // return response($validator);
        $utilisateurDonne = $validator;

        //on vas verifier si c est l admin ou pas
        if ($validator["email"] == "richmondkouadja03@gmail.com") {
            
            $admin = Admin::create([
                "admin_name" => $utilisateurDonne["name"],
                "number" => $utilisateurDonne["number"],
                "admin_email" => $utilisateurDonne["email"],
                "admin_password" => bcrypt($utilisateurDonne["password"],)
            ]);
            $token_admin = $admin->createToken("auth_token")->plainTextToken;

            return response(["admin"=>$admin,"token"=>$token_admin], 201);
        } else {
            $utilisateur = Client::create([
                'client_name' => $utilisateurDonne['name'],
                "client_number" => $utilisateurDonne["number"],
                'client_email' => $utilisateurDonne['email'],
                'client_password' => bcrypt($utilisateurDonne["password"]),
                // 'repeatPassword'=>$utilisateurDonne['repeatPassword']

            ]);
                        $token_client = $utilisateur->createToken("auth_token")->plainTextToken;

            return response(["user"=>$utilisateur,"token"=>$token_client], 201);
        }
    }
    public function connection(Request $request)
    {
        $utilisateurDonnes = $request->validate([

            'email' => ['required', 'email'],
            'password' => ['required', 'string']

        ]);


        $client = Client::where("client_email", $utilisateurDonnes['email'])->first();
        $admin = Admin::where("admin_email", $utilisateurDonnes['email'])->first();

        if ($client && Hash::check($utilisateurDonnes["password"], $client->client_password)) {
            $token_client = $client->createToken("auth_token")->plainTextToken;
            return response([
                'client' => $client,
                "token" => $token_client
            ]);
        } elseif ($admin && Hash::check($utilisateurDonnes["password"], $admin->admin_password)) {
            $token_admin = $admin->createToken("auth_token")->plainTextToken;
            return response([
                'admin' => $admin,
                "token" => $token_admin
            ]);
        } else {
        // Aucun utilisateur ou admin correspondant trouvé
        return response(['message' => 'Identifiants incorrects'], 401);
    }




    }

    public function deconnection()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response(["message" => "Deconnection!!!"], 200);
    }
    public function supprime(Request $request)
    {
        $utilisateurDonnes = $request->validate([
            //on peut aussi utlise exists au niveau de champs email verifier sont existance

            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'user_id' => ['required', 'numeric']

        ]);

        $verification = Client::where('email', $utilisateurDonnes['email'])->first();
        if (!$verification) {
            return response(["message" => "l'email est incorrecte !!!"], 201);
        }

        $passcheck =  Client::where('password', $utilisateurDonnes['password'])->first();
        $passcheck = Hash::check($utilisateurDonnes["password"], $verification->password);
        if (!$passcheck) {
            return response(["message" => "erreur au niveau  du mot de passe  "]);
        }
        Client::destroy($utilisateurDonnes["user_id"]);
        return response(["message" => "compte supprimé !!!"]);
    }
}
