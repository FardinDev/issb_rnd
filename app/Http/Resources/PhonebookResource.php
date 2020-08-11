<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PhoneNumberResource;

class PhonebookResource extends JsonResource
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
          'name' =>  $this->name.' ('.$this->parent.')',
          'parent_thana' => $this->parent,
          'sub_thana' => $this->name,
          'officers' => PhoneNumberResource::collection($this->users)
        ];
    }
}
