<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

class FoodController extends Controller
{
    public function index() {
        $foodList = Food::paginate(15);
        return view("foods.index", ["foodList" => $foodList]);
    }

    public function show($id) {
        $foodItem = Food::findOrFail($id);
        return view("foods.show", ["food" => $foodItem]);
    }

    public function create() {
        return view("foods.create");
    }

    public function store() {
        $food = new Food();
        $food->name = request("name");
        $food->price = request("price");
        $food->description = request("description");
        $food->toppings = request("topping");
        $food->save();
        return redirect("/foods")->with("message", "Food created!");
    }

    public function edit($id) {
        $food = Food::findOrFail($id);
        return view("foods.edit", ["food" => $food]);
    }

    public function update($id) {
        $food = Food::findOrFail($id);
        $food->name = request("name");
        $food->price = request("price");
        $food->description = request("description");
        $food->save();
        return redirect("/foods")->with("message", "Food updated!");
    }

    public function destroy($id) {
        $food = Food::findOrFail($id);
        // staviti if svuda!
        $food->delete();
        return redirect("/foods")->with("message", "Food: " . $food->name . " deleted succcessfully!");
    }

}
