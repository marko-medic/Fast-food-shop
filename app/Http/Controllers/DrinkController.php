<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drink;
use App\Http\Resources\Drink as DrinkResource;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinks = Drink::paginate(10);
        return DrinkResource::collection($drinks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $drink = $request->isMethod("post") ? new Drink() : Drink::findOrFail($request->id);
        // moze i $request->input("name");
        $drink->name = $request->name;
        $drink->price = $request->price;
        $drink->description = $request->description;

        $drink->save();
        return new DrinkResource($drink);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drink = Drink::findOrFail($id);
        return new DrinkResource($drink);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drink = Drink::findOrFail($id);
        $drink->delete();
        return new DrinkResource($drink);
    }
}
