<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{
    protected $guarded = [];

    function user(){
        return $this->belongsTo('App\User');
    }

   function post(){
       return $this->belongsTo('App\Post');
   }

   public function getCreatedAtAttribute($date)
   {
       return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F d, Y G:i A');
   }
   
   public function getUpdatedAtAttribute($date)
   {
       return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F d, Y G:i A');
   }
}
