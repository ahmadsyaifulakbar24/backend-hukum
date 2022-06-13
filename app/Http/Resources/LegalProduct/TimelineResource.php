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
        $start_date = $this->review()->orderBy('finish_date', 'DESC')->pluck('finish_date')->first();
        return [
            'review' => ReviewTimelineResource::collection($this->review),
            'finalization' => [
                'start_date' => $start_date,
                'finish_date' => $this->finalization_finish_date
            ],
            'determination' => [
                'start_date' => $this->finalization_finish_date,
                'finish_date' => !empty($this->determination->created_at) ? $this->determination->created_at : null,
            ]
        ];
    }
}
