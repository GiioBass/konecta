<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sell;
use Illuminate\Http\Request;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $data = $data['_value'];
            $productId = 0;
            $productStock = Product::find($productId)->pluck('stock');

            if (($data['quantity'] - $productStock) <= 0) {
                return response()->json([
                    'stock' => false,
                    'success' => false,
                    'message' => 'There is no stock available'
                ]);
            }

            Sell::create($data);
            Product::where('id', $productId)
                ->update([
                    'stock' =>  $data['quantity'] - $productStock
                ]);

            return response()->json([
                'stock' => true,
                'success' => true,
                'message' => 'There is no stock available'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'stock' => false,
                'success' => false,
                'message' => 'Error'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function show(Sell $sell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sell $sell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sell $sell)
    {
        //
    }
}
