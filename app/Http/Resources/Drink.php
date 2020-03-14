<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Drink extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "price" => $this->price
        ];
    }

    public function with($request) {
        return [
            "version" => "v1",
            "requset_id" => $request->id ?? "none",
            "author_url" => url("https://github.com/markorf")
        ];
    }
}
