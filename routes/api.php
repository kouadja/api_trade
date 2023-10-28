<?php

use Illuminate\Http\Request;
use App\Http\Controllers\sign_and_loginController;
// use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;

// use App\Models\Cars;

//la route permet de faire l inscription
route::post('/inscription',[sign_and_loginController::class,'inscription']);
// la route reservée pour la connection
route::post('/connexion',[sign_and_loginController::class,'connection']);
// route pour afficher toutes les ressources



route::get('/cars',[CarsController::class,'index']);
// route pour creer toutes les ressources
route::post('/cars',[CarsController::class,'store']);

// route::get("/",[U])




// ces routes protegées par un middleware qui authentifié l utilisateur
route::get('/cars/{id}',[CarsController::class,'show']);
Route::group(["middleware"=>'auth'],function(){
    route::put('/cars/{id}',[CarsController::class,'update']);
    route::delete('/cars/{id}',[CarsController::class,'destroy']);
    route::post('/utilisateur/compte/deconnection',[userController::class,'deconnection']);
    route::post('/utilisateur/compte/supprime',[userController::class,'supprime']);



})

;
// include 'api.php';
