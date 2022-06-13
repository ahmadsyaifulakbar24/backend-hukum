<?php

namespace App\Http\Resources\Review;

use App\Http\Resources\LegalProduct\LegalProductDetailResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewDetailResource extends JsonResource
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
            'title' => $this->title,
            'legal_product' => new LegalProductDetailResource($this->legal_product),
            'status' => $this->status,
            'finish_date' => $this->finish_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
