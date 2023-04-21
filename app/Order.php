<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function articles(){
        return $this->belongsToMany('App\Article')->withPivot('quantity');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
