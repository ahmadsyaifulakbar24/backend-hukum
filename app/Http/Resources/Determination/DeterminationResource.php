<?php

namespace App\Http\Resources\Determination;

use App\Http\Resources\Footnote\FootnoteResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DeterminationResource extends JsonResource
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
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'position' => $this->user->position,
                'phone_number' => $this->user->phone_number,
                'photo_url' => $this->user->photo_url,
            ],
            'legal_product_id' => $this->legal_product_id,
            'file_url' => $this->file_url,
            'footnote' => FootnoteResource::collection($this->footnote),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
