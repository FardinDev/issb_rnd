<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    protected $fillable = [	'unique_id','name','parent','isEnabled'];


    public function users()
    {
        return $this->belongsToMany('App\User', 'thana_users');
    }

    function posts(){
        return $this->hasMany('App\Post');
    }
}
