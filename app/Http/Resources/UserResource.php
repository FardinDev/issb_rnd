<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name ? $this->name : '',
            'email' => $this->email ? $this->email : '',
            'phone' => $this->phone ? $this->phone : '',
            'avatar' => $this->avatar ? asset($this->avatar) : asset('/images/default-user-image.png'),
        ];
    }
}
