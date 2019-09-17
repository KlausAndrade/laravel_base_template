<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        return ['success' => true, 'data' => Product::all()];
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
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return void
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return array
     */
    public function updateActive(Request $request, Product $product)
    {

        $product = Product::where('id', $request->id)->update(['active' => $request->active]);

        return ['success' => true, 'data' => $product];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return array
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return ['success' => true];

    }
}
