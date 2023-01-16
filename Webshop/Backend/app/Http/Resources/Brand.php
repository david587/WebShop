<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Brand extends JsonResource
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
            "brands_id" => $this->brands_id,
            "redragon" => $this->redragon,
            "hp"=> $this->hp,
            "logitech"=>$this->logitech,
            "urage"=>$this->urage
        ];
    }
}
