<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class orderInfo extends JsonResource
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
            "shippingAddress"=>$this->shippingAddress,
            "phone" => $this->phone,
            "paymentMethod,"=>$this->paymentMethod,
            "order_id" => $this->order_id
        ];
    }
}
