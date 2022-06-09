<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
                'name' => $this->user->name,
                'position' => $this->user->position,
                'phone_number' => $this->user->phone_number,
                'photo_url' => $this->user->photo_url,
            ],
            'review_id' => $this->review_id,
            'finalization_id' => $this->finalization_id,
            'comment' => $this->comment,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
