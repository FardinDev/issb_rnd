<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */


    function elipsis($string, $repl, $limit) 
    {
      if(strlen($string) > $limit) 
      {
        return substr($string, 0, $limit) . $repl; 
      }
      else 
      {
        return $string;
      }
    }

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'location' => $this->location,
            'title' => mb_convert_encoding($this->title, 'UTF-8', 'UTF-8'),
            'description' => mb_convert_encoding($this->elipsis($this->description, '...', 50), 'UTF-8', 'UTF-8'),
            'thumb' => asset($this->thumb),
            'comment_count' => count($this->comments),
            'date_time' => $this->created_at,
        ];
    }
}
