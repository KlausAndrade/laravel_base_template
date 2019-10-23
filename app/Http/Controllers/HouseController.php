<?php

namespace App\Http\Controllers;

use App\House;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class HouseController extends Controller
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
        return ['success' => true, 'data' => House::orderBy('created_at','desc')->with('image')->get()];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return array
     */
    public function store()
    {
        $validData = request()->validate([
            "address" =>'required',
            "checkin" =>'required',
            "checkout" =>'required',
            "city" =>'required',
            "country" =>'required',
            "dedicated" =>'required',
            "description" =>'required',
            "guests" =>'required',
            "name" =>'required',
            "number" =>'required',
            "price" =>'required',
            "rooms" =>'required',
            "space" =>'required',
            "state" =>'required',
            "type" =>'required',
            "zipcode" =>'required',
        ]);

        $house = auth()->user()->house()->create($validData);

        return ['success' => true, 'data' => $house];
    }

    /**
     * Display the specified resource.
     *
     * @param House $house
     * @return array
     */
    public function show(House $house)
    {
        $house->load('image');
        return ['success' => true, 'data' => $house];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param House $house
     * @return void
     */
    public function update(House $house)
    {

        $house->update(request()->except(['image', 'active']));

        return response()->json(['success'=> true], 200);

    }

    public function uploadImages(House $house){


        request()->validate(['file' => 'image']);

        $images = Collection::wrap(request()->file('file'));


        $images->each(function ($image) use ($house) {

            $path = "/dist/img/houses/{$house->id}/";
            $imageName = Str::random();
            $original = "{$imageName}.". $image->getClientOriginalExtension();

            $image->move(public_path($path), $original);

            $house->image()->create(['url' => $path.$original]);
        });

        return response()->json(['success' => true, 'data' => 'ok'], 200);

    }


    public function removeImage(House $house, Image $image){

        $image->delete();

        return response()->json(['success'=> true], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param House $house
     * @return array
     */
    public function updateActive(Request $request, House $house)
    {

        $house = House::where('id', $request->id)->update(['active' => $request->active]);

        return ['success' => true, 'data' => $house];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param House $house
     * @return array
     * @throws \Exception
     */
    public function destroy(House $house)
    {
        $house->delete();

        return ['success' => true];

    }
}
