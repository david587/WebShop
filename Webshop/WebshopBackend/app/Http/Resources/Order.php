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
            "orders_id" => $this->orders_id,
            "orderDate" => $this->orderDate,
            "shippingAddress"=> $this->shippingAddress,
            "total"=>$this->total,
            "paymentMethod,"=>$this->paymentMethod,
            "product_id"=>$this->product_id,
            "user_id" => $this->user_id
        ];
    }
}
