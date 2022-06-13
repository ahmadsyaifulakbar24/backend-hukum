<?php

namespace App\Http\Resources\LegalProduct;

use App\Http\Resources\Review\ReviewTimelineResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TimelineResource extends JsonResource
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
            'review' => ReviewTimelineResource::collection($this->review)
        ];
    }
}
