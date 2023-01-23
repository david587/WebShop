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
            "id" => $this->id,
            "product_id"=>$this->name->name,
            "user_id" => $this->name->name,
            "shippingAddress"=> $this->shippingAddress,
            "paymentMethod,"=>$this->paymentMethod,
           
        ];
    }
}
