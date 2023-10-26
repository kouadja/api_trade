<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class clientController extends Controller
{
    public function inscription(Request $request)
    {

        $utilisateurDonne = $request->validate([

            'client_name' => ['string', 'max:30', 'min:3'],
            "last_name_client"=>['string', 'max:30', 'min:3'],
            'email' => ['email', 'max:30', 'min:8', 'unique:users,email'],
            'password' => ['string', 'max:30', 'min:3'],

        ]);
        $utilisateurs = Client::create([
            'client_name' => $utilisateurDonne['client_name'],

            'client_email' => $utilisateurDonne['email'],
            'client_password' => bcrypt($utilisateurDonne["password"]),
            // 'repeatPassword'=>$utilisateurDonne['repeatPassword']

        ]);
        return response($utilisateurs, 201);
        // return $utilisateur;

    }
    public function connection(Request $request)
    {
        $utilisateurDonnes = $request->validate([

            'email' => ['required','email'],
            'password' => ['required','string' ],

        ]);

        $utilisateur = Client::where("email",$utilisateurDonnes['email'])->first();

        if(!$utilisateur) {
            return response(["message"=>'ce email ne correspond à aucun compte'],404); 
       
        }

        if(!Hash::check($utilisateurDonnes["password"],$utilisateur->password)){
            return response(["message"=>'ce mot de passe est incorrect '],404);
        } 


    $token= $utilisateur->createToken("auth_token")->plainTextToken;
        return response(['utilisateur'=>$utilisateur,
        "token"=>$token]);
    }

    public function deconnection(){
        auth()->user()->tokens->each(function($token,$key){
            $token->delete();
        });
        return response(["message"=>"Deconnection!!!"],200);
    }
    public function supprime(Request $request){
        $utilisateurDonnes = $request->validate([
            //on peut aussi utlise exists au niveau de champs email verifier sont existance 

            'email' => ['required','email'],
            'password' => ['required','string' ],
            'user_id'=>['required','numeric']

        ]);
       
        $verification = Client::where('email',$utilisateurDonnes['email'])->first();
        if(!$verification){
            return response(["message"=>"l'email est incorrecte !!!"],201);
        }

        $passcheck =  Client::where('password',$utilisateurDonnes['password'])->first();
        $passcheck =Hash::check($utilisateurDonnes["password"],$verification->password);
        if(!$passcheck){
            return response(["message"=>"erreur au niveau  du mot de passe  "]);

        }
        Client::destroy($utilisateurDonnes["user_id"]);
        return response(["message"=>"compte supprimé !!!"]);

    }
}

