<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $casts = [
        "toppings" => 'array'
    ];

    public function user() {
        return $this->belongsTo("App\User");
    }
}
