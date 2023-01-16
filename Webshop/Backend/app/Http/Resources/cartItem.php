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
            "productName" => $this->productName,
            "image"=> $this->image,
            "quantity"=>$this->quantity,
            "itemCost"=>$this->itemCost,
            "totalCost"=>$this->totalCost,
            "product_id"=>$this->product_id,
            "user_id" => $this->user_id
        ];
    }
}
