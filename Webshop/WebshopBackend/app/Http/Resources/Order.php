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
        // $uniqueAddresses = $this->unique('orderInformation.shippingAddress');
        // $uniquePhoneNumbers = $this->unique('orderInformation.phone');
        // $uniquePaymentMethods = $this->unique('orderInformation.paymentMethod');
        
        return [
            "productName"=>$this->product->name,
            "Description"=>$this->product->details,
            "Price"=>$this->product->price,
            "quantity" => $this->quantity,
            "userName"=>$this->user->name,
            "email"=>$this->user->email,
            "shippingAddress"=>$this->orderInformation->shippingAddress,
            "phoneNumber"=>$this->orderInformation->phone,
            "paymentMethod"=>$this->orderInformation->paymentMethod
        ];
        
    }
}
