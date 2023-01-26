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
    {
        return [
            //change these to the current
            "productName"=>$this->product->name,
            "Description"=>$this->product->details,
            "Price"=>$this->product->price,
            "quantity" => $this->quantity,
            "userName"=>$this->user->name,
            "email"=>$this->user->email,
            //innentül nem jó, nem jön át az orderinfo
            // "shippingAddress"=>$this->orderInfo,
            // "phoneNumber"=>$this->orderInfo,
            // "paymentMethod"=>$this->orderInfo
        ];
    }
}
