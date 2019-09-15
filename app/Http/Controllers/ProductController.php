<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $validData = request()->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $product = Product::create($validData);

        $hasImage = request()->validate([
            'image' => 'nullable'
        ]);

        if(!is_null($hasImage['image']))
        {
            $product->image()->create([$hasImage]);
        }

        return ['success' => true, 'data' => $product];
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return array
     */
    public function show(Product $product)
    {
        return ['success' => true, 'data' => $product];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return void
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return void
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return void
     */
    public function destroy(Product $product)
    {
        //
    }
}
