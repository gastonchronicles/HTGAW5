<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public function follower()
    {
      return $this->belongsTo('App\User','follow_id');
    }

}
