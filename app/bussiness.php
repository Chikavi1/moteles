<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bussiness extends Model
{
    public function rooms()
    {
        return $this->hasMany('App\room');
    }
}
