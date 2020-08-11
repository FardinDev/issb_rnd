<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ThanaResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'date_time' => $this->created_at,
            'file' =>  $this->file ? asset($this->file) : '',
            'thumb' => asset($this->thumb),
            'thana' => new ThanaResource($this->thana),
            'post_user' => new UserResource($this->user),
            'comments' =>  CommentResource::collection($this->comments),
        ];
    }
}
