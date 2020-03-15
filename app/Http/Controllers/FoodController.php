<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

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
            "description" => "required"
        ]);
        $food = new Food();
        $food->name = request("name");
        $food->price = request("price");
        $food->description = request("description");
        $food->toppings = request("toppings") ?? [];
        $food->user_id = Auth()->user()->id;
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
            "description" => "required"
        ]);
        $food = Food::findOrFail($id);
        $food->name = request("name");
        $food->price = request("price");
        $food->description = request("description");
        $food->toppings = request("toppings") ?? [];
        $food->save();
        return redirect(Route("foods.index"))->with("success", "Food updated!");
    }

    public function destroy($id) {
        $food = Food::findOrFail($id);
        // staviti if svuda!
        $food->delete();
        return redirect(Route("foods.index"))->with("success", "Food: " . $food->name . " deleted succcessfully!");
    }

}
