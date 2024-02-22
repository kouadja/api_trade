<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\clientController;
// use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\driverUserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\sign_and_loginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get("/produit/{id}", [ProductController::class, "show"])->where('id', '[0-9]+');
route::post('/inscription',[sign_and_loginController::class,'inscription']);
route::post('/connexion',[sign_and_loginController::class,'connection']);
route::post('/produit',[ProductController::class,"store"]);
route::get("/search/{search}",[ProductController::class,"search"]);
// route::post('/cars',[CarsController::class,'store']);

route::get('/products',[ProductController::class,"index"]);
route::get('/cars',[CarsController::class,'index']);

Route::get('/products/{productId}/image', [ProductController::class, 'getProductImage']);


route::post("/login",[driverUserController::class,"store"]);
route::post("/re",[OrderController::class,"store"]);



// ces routes protegées par un middleware qui authentifié l utilisateur
// route::get('/cars/{id}',[CarsController::class,'show']);


Route::middleware('auth:sanctum')->group(function () {
    route::post("/register",[clientController::class,"store"]);
    // Vos routes protégées par Sanctum ici
});

