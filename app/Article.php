<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function section(){
        return $this->belongsTo('App\Section');
    }

    public function genre(){
        return $this->belongsTo('App\Genre');
    }

    public function substance(){
        return $this->belongsTo('App\Substance');
    }

    public function color(){
        return $this->belongsTo('App\Color');
    }

    public function priceHT(){
        return $this->price / 1.2;
    }

    public function orders(){
        return $this->belongsToMany('App\Order')->withPivot('quantity');
    }
}
