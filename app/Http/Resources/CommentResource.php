<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uuid' => $this->unique_id,
            'location' => $this->location,
            'comment' => $this->comment,
            'date_time' => $this->created_at,
            'comment_user' => new UserResource($this->user)
        ];
    }
}
