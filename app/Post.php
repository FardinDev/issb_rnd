<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $guarded = [];

    function user(){
        return $this->belongsTo('App\User');
    }

    function thana(){
        return $this->belongsTo('App\Thana');
    }

    function comments(){
        return $this->hasMany('App\Comment');
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
