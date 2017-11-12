<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table ="reviewTrip";
    protected $primarykey ='id';
    protected $fillale = ['trip_id','user_id','rate','status','rate_des','image'];
}
