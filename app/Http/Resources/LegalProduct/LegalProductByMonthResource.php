<?php

namespace App\Http\Resources\LegalProduct;

use Illuminate\Http\Resources\Json\JsonResource;

class LegalProductByMonthResource extends JsonResource
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
            'id' => $this->id,
            'type' => $this->type,
            'name' => $this->name,
            'january' => $this->january,
            'february' => $this->february,
            'march' => $this->march,
            'april' => $this->april,
            'may' => $this->may,
            'june' => $this->june,
            'july' => $this->july,
            'august' => $this->august,
            'september' => $this->september,
            'october' => $this->october,
            'november' => $this->november,
            'december' => $this->december,
        ];
    }
}
