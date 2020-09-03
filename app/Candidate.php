<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public function issb()
    {
        return $this->belongsTo('App\IssbData');
    }
}
