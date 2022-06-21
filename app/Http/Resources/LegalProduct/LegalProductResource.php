<?php

namespace App\Http\Resources\LegalProduct;

use App\Http\Resources\Params\ParamResource;
use App\Http\Resources\ServiceCategory\ServiceCategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LegalProductResource extends JsonResource
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
            'created_by' => [
                'id' => $this->user_created_by->id,
                'name' => $this->user_created_by->name,
            ],
            'service_category' => new ServiceCategoryResource($this->service_category),
            'title' => $this->title,
            'mandate' => new ParamResource($this->mandate),
            'completion_target' => $this->completion_target,
            'progress' => $this->progress,
            'status' => $this->status,
            'finish_date' => $this->finish_date,
            'stage_status' => new StageStatusResource($this),
            'timeline' => new TimelineResource($this),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
