<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return response()->json($products);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = new Products;
        $products->fill($request->all());
        $products->save();

        return response()->json($products, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        if (! $product->id) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        if (! $product->id) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $product->fill($request->all());
        $product->save();

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        if (! $product->id) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Registro deletado'], 200);
    }
}
