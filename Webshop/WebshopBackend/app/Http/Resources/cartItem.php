<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class cartItem extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "quantity"=>$this->quantity,
<<<<<<< HEAD
            "product"=> [
                "name"=>$this->product->name,
                "description"=>$this->product->description,
                "price"=>$this->product->price,
                "image"=>$this->product->image
            ],
=======
            // "product"=> [
                "Productname"=>$this->product->name,
                "description"=>$this->product->details,
                "price"=>$this->product->price,
                "image"=>$this->product->image,
            // ],
>>>>>>> ffe7901c58235b516c33253a271c9a43a34f0d64
            "user_id" => $this->user->name 
        ];
    }
}
