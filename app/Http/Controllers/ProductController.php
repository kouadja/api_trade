<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller


{
    public function __construct()
    {
        $this->middleware('api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        if (count($products) == 0) {
            response("pas de produit ", 200);
        } else {
            return response($products, 200);
        }
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
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
   /*  public function store(Request $request){  

        try {
            $validator = $request->validate([
                "product_name" => ['required', 'string', 'max:30', 'min:3'],
                "product_description" => ['required', 'string', 'max:30', 'min:3'],
                "product_price" => ['required', 'numeric'],
                "product_nbs" => ['required', 'numeric'],
                'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

                // "category_id" => ['1', 'numeric']
            ]);

            $imageName = time().'.'.$request->product_image->extension();  

            $request->product_image->move(public_path('images'), $imageName);

   
            $data = Product::create([
                "product_name" => $validator["product_name"],
                "product_description" => $validator["product_description"],
                "product_price" => $validator["product_price"],
                "product_nbs" => $validator["product_nbs"],
                "product_image" => $validator["product_image"],
                // "category_id" => $validator["category_id"],
            ]);

            return response($data, 200);
        } catch (\Throwable $th) {
            return response(['error' => $th->getMessage()], 500);
        }
    } */

    public function store(Request $request)
{
  /*   return response()->json(["message" => $request->all()]);
    if($request->hasFile("product_image")){
        
        $file = $request->file("product_image");
        $filename = $file->getClientOriginalName();
        $finalName = date('His') . $filename;
        $request->file("image")->storeAs('images/', $finalName, "public");
        return response()->json(["message" => "Successfully upload an image"]);
    } else {
    return response()->json(["message" => "You must select "]);
     */

   /*  } */


    try {
        $validator = $request->validate([
            "product_name" => ['required', 'string', 'max:30', 'min:3'],
            "product_description" => ['required', 'string', 'max:300', 'min:3'],
            "product_price" => ['required', 'numeric'],
            "product_nbs" => ['required', 'numeric'],
            'product_image' => '',
        ]);


        $data = Product::create([
            "product_name" => $validator["product_name"],
            "product_description" => $validator["product_description"],
            "product_price" => $validator["product_price"],
            "product_nbs" => $validator["product_nbs"],
            "product_image" => $validator["product_image"], // Utilisez le nom de l'image, pas l'objet de fichier
        ]);

        return response($data, 200);
    } catch (\Throwable $th) {
        return response(['error' => $th->getMessage()], 500);
    }
}

    


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (is_null($product)) {
            return response(["message" => "Aucun produit est lié a cette url"], 404);
        }
        return response($product, 200);
    }
    public function getProductImage($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Vérifiez si le produit a une image
        if (!$product->product_image) {
            return response()->json(['error' => 'Product does not have an image'], 404);
        }

        $path = storage_path('app/public/product_images/' . $product->product_images);

        return response()->file($path);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }
    public function search($search)
    {
        $results = Product::whereRaw('LOWER(product_name) like ?', ['%' . strtolower($search) . '%'])->get();


        if (!$results) {
            return response(['message' => 'pas de produit correspondant à cet article'], 404);
        } else {
            return response($results, 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
