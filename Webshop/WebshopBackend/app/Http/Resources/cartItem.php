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
            // "product"=> [
                "Productname"=>$this->product->name,
                "description"=>$this->product->details,
                "price"=>$this->product->price,
                "image"=>$this->product->image,
            // ],
            "user_id" => $this->user->name 
        ];
    }
}
