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

        $p_assignment = ($this->assignment()->count() > 0) ? 100 : 0;
        $p_review = ( $review_process > 0) ? $review_process : 0;
        $p_finalization = ($this->finalization_progress > 0) ? $this->finalization_progress : 0;
        $p_determination = ($this->determination()->count() > 0) ? 100 : 0;
        $p_total_progress = ($p_assignment + $p_review + $p_finalization + $p_determination) / 4;
        return [
            'legal_product_status' => $this->status,
            'assignment' => $p_assignment,
            'review' => $p_review,
            'finalization' => $p_finalization,
            'determination' =>  $p_determination,
            'total_progress' => $p_total_progress,
        ];
    }
}
