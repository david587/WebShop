<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
<<<<<<< HEAD
    {
        return [
            //change these to the current
            "id" => $this->id,
            "product_id"=>$this->product_id,
            "user_id" => $this->user_id,
            "quantity" => $this->quantity,
            "orderInfo_id" => $this->orderInfo_id
           
        ];
=======
    {   
        return [
            "productName"=>$this->product->name,
            "Description"=>$this->product->details,
            "Price"=>$this->product->price,
            "quantity" => $this->quantity,
            "userName"=>$this->user->name,
            "email"=>$this->user->email,
        ];
        
>>>>>>> ffe7901c58235b516c33253a271c9a43a34f0d64
    }
}
