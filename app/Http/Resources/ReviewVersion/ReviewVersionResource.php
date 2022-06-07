<?php

namespace App\Http\Resources\ReviewVersion;

use App\Http\Resources\File\FileResource;
use App\Http\Resources\Footnote\FootnoteResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewVersionResource extends JsonResource
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
            'review_id' => $this->review_id,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'version_name' => $this->version_name,
            'file_url' => $this->file_url,
            'footnote' => FootnoteResource::collection($this->footnote),
            'note' => FileResource::collection($this->note),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
