<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = Product::paginate();
            return response()->json([
                'success' => true,
                'data' => $products,
                'message' => 'All products'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error'
            ]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            Product::create($data['_value']);
    
            return response()->json([
                'success' => true,
                'message' => 'Product created successful'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        try {
            $product = Product::find($product->id);
            Log::debug($product);
            return response()->json([
                'success' => true,
                'data' => $product,
                'message' => 'Product'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            $data = $request->all();
            $data = $data['_value'];
            $dataUpdate = [
                'name' => $data['name'],
                'reference' => $data['reference'],
                'category' => $data['category'],
                'price' => $data['price'],
                'weight' => $data['weight'],
                'stock' => $data['stock'],
                'updated_at' => Carbon::now()->format('Y-m-d')
            ];
            
            Product::where('id', $product->id)
                ->update($dataUpdate);
    
            return response()->json([
                'success' => true,
                'message' => 'Product updated successful'
            ]);
        } catch (\Throwable $th) {
            Log::debug($th);
            return response()->json([
                'success' => false,
                'message' => 'Error'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        
            try {
                Product::where('id', $product->id)
                    ->delete();
        
                return response()->json([
                    'success' => true,
                    'message' => 'Product deleted successful'
                ]);
            } catch (\Throwable $th) {
                Log::debug($th);
                return response()->json([
                    'success' => false,
                    'message' => 'Error'
                ]);
            }
    }
}
