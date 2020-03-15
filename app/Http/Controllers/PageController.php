<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PageController extends Controller
{
    public function index() {
        return view("pages.welcome");
    }

    public function dashboard() {
        $userId = Auth()->user()->id;
        $user = User::find($userId);
        return view("pages.dashboard", ["userFoods" => $user->foods]);
    }
}
