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
            "cartItems_id" => $this->cartItems_id,
            "quantity"=>$this->quantity,
            "product_id"=>$this->name->name,
            "user_id" => $this->name->name
        ];
    }
}
