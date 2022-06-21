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
            'assignment' => [
                'start_date' => $this->assignment_start_date,
                'finish_date' => $this->assignment()->max('created_at'),
            ],
            'review' => ReviewTimelineResource::collection($this->review),
            'finalization' => [
                'start_date' => $this->finalization_start_date,
                'finish_date' => $this->finalization_finish_date
            ],
            'determination' => [
                'start_date' => $this->determination_start_date,
                'finish_date' => !empty($this->determination->updated_at) ? $this->determination->updated_at : null,
            ]
        ];
    }
}
