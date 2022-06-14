<?php

namespace App\Http\Resources\LegalProduct;

use Illuminate\Http\Resources\Json\JsonResource;

class StageStatusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $review = $this->review();
        $review_process = ($review->count() != 0) ? round($review->sum('status') / $review->count(), 2) : 0;
        return [
            'legal_product_status' => $this->status,
            'assignment' => ($this->assignment()->count() > 0) ? 100 : null,
            'review' => ( $review_process > 0) ? $review_process : null,
            'finalization' => ($this->finalization_progress > 0) ? $this->finalization_progress : null,
            'determination' =>  ($this->determination()->count() > 0) ? 100 : null,
        ];
    }
}
