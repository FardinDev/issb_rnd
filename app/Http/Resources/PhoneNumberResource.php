<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhoneNumberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        if($this->level < 4){

            return [
                'name' => $this->name,
                'designation' => $this->designation.' ('.$this->works_at.')',
                'works_at' => $this->works_at,
                'phone' => $this->phone
            ];
        } 
    }
}
