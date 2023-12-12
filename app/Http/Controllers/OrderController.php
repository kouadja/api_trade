<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
        // $client_id = $data["client_id"];
            $order_id = DB::table('orders')->insertGetId([
                'client_id' => 1,
                "client_name"=> $data["client_name"],
                "client_number"=> $data["client_number"],
                "client_email"=> $data["client_email"],
                "client_city"=> $data["client_city"],
                "date_delivery"=> $data["date_delivery"],
                "client_adress"=> $data["client_adress"],
                "payment_way"=> $data["payment_way"],
                "price" => $data["price"],

            ]);
              // Ajoutez les produits à la commande
            foreach ($data['article'] as $produit) {
                DB::table('order_products')->insert([
                    'commande_id' => $order_id,
                    'product_id' => $produit['id'],
                    "",
                    'quantite' => $produit['quantite'],
                    // Ajoutez d'autres colonnes produit_commande selon vos besoins 
                ]);
            }
                  DB::commit();

        }  catch (\Exception $e) {
            // En cas d'erreur, annulez la transaction
            DB::rollback();

            return response()->json(['success' => false, 'message' => 'Erreur lors de l\'ajout des produits à la commande']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
