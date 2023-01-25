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
            "id" => $this->id,
            "product_id"=>$this->product_id,
            "user_id" => $this->user_id,
            "quantity" => $this->quantity,
            "orderInfo_id" => $this->orderInfo_id
           
        ];
    }
}
