<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Substance extends Model
{
    public function articles() {
        return $this->hasMany('\App\Article');
    }
}
