<?php

namespace App\Http\Resources\Finalization;

use App\Http\Resources\File\FileResource;
use App\Http\Resources\Footnote\FootnoteResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FinalizationResource extends JsonResource
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
            'legal_product_id' => $this->legal_product_id,
            'file_url' => $this->file_url,
            'footnote' => FootnoteResource::collection($this->footnote),
            'attachment' => FileResource::collection($this->note()->where('type', 'finalization_attachment')->get()),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
