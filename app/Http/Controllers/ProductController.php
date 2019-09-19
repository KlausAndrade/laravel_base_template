<?php

namespace App\Http\Controllers;

use App\Product;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        return ['success' => true, 'data' => Product::orderBy('created_at','desc')->with('image')->get()];
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
        $product->load('image');
        return ['success' => true, 'data' => $product];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return void
     */
    public function update(Product $product)
    {

        $product->update(request()->except('image'));

        return response()->json(['success'=> true], 200);

    }

    public function uploadImages(Product $product){

        request()->validate(['file' => 'image']);

        $images = Collection::wrap(request()->file('file'));


        $images->each(function ($image) use ($product) {

            $path = "/dist/img/products/{$product->id}/";
            $imageName = Str::random();
            $original = "{$imageName}.". $image->getClientOriginalExtension();

            $image->move(public_path($path), $original);

            $product->image()->create(['url' => $path.$original]);
        });

        return response()->json(['success' => true, 'data' => 'ok'], 200);

    }


    public function removeImage(Product $product, Image $image){

        $image->delete();

        return response()->json(['success'=> true], 200);

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
