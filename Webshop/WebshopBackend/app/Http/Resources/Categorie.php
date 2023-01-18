<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Categorie extends JsonResource
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
            "categories_id" => $this->categories_id,
            "keyboard" => $this->keyboard,
            "mouse"=> $this->mouse,
            "headset"=>$this->headset,
            "monitor"=>$this->monitor
        ];
    }
}
