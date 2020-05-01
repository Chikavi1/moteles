<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    protected $fillable = [
       'invoice','price','description','status','day','bussiness_id','user_id'
    ];

}
