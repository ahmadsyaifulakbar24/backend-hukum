<?php

namespace App\Http\Resources\Assignment;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupByLegalProductResource extends JsonResource
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
            'user' => $this->name,
            'total' => $this->total,
        ];
    }
}
