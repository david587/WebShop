<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            "name" => $this->name,
            "price"=> $this->price,
            "details"=>$this->details,
            "image"=>$this->image,
            "brand_id"=>$this->brand->brand,
            "categorie_id"=>$this->categorie->categorie
        ];
    }
}
