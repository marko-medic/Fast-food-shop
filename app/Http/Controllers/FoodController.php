<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function index() {
        $foodList = Food::orderBy("created_at", "desc")->paginate(15);
        return view("foods.index", ["foodList" => $foodList]);
    }

    public function show($id) {
        $foodItem = Food::findOrFail($id);
        return view("foods.show", ["food" => $foodItem]);
    }

    public function create() {
        return view("foods.create");
    }

    public function store(Request $request) {
        $this->validate($request, [
            "name" => "required",
            "price" => "required",
            "description" => "required",
            "featured_image" => "image|nullable|max:1999"
        ]);

        $featured_image = 'featured_image';
        if ($request->hasFile($featured_image)) {
            $filenameWithExt = $request->file($featured_image)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file($featured_image)->getClientOriginalExtension();
            $filenameToStore = $filename .'_'. time() .'.'.$extension;
            $request->file($featured_image)->storeAs('public/featured_images', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        $food = new Food();
        $food->name = request("name");
        $food->price = request("price");
        $food->description = request("description");
        $food->toppings = request("toppings") ?? [];
        $food->user_id = Auth()->user()->id;
        $food->featured_image = $filenameToStore;
        $food->save();
        return redirect(Route("foods.index"))->with("success", "Food created!");
    }

    public function edit($id) {
        $food = Food::findOrFail($id);
        $food->toppings = $food->toppings ?? [];
        return view("foods.edit", ["food" => $food]);
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            "name" => "required",
            "price" => "required",
            "description" => "required",
            "featured_image" => "image|nullable|max:1999"
        ]);

        $featured_image = 'featured_image';
        if ($request->hasFile($featured_image)) {
            $filenameWithExt = $request->file($featured_image)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file($featured_image)->getClientOriginalExtension();
            $filenameToStore = $filename .'_'. time() .'.'.$extension;
            $request->file($featured_image)->storeAs('public/featured_images', $filenameToStore);
        }

        $food = Food::findOrFail($id);
        $food->name = request("name");
        $food->price = request("price");
        $food->description = request("description");
        $food->toppings = request("toppings") ?? [];
        if($request->hasFile($featured_image)) {
            $food->featured_image = $filenameToStore;
        }
        $food->save();
        return redirect(Route("foods.index"))->with("success", "Food updated!");
    }

    public function destroy($id) {
        $food = Food::findOrFail($id);
        if ($food->featured_image !== 'noimage.jpg') {
            Storage::delete("public/featured_images/".$food->featured_image);
        }
        // staviti if svuda!
        $food->delete();
        return redirect(Route("foods.index"))->with("success", "Food: " . $food->name . " deleted succcessfully!");
    }

}
