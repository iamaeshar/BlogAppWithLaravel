<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    function user(){
        return $this->belongsTo('App\User');
    }
}
