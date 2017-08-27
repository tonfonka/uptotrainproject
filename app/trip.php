<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trip extends Model
{
   
    protected $table = "trips";
    protected $fillable = [
         'id','trips_name', 'trip_nday', 'trip_nnight','trip_province','trip_meal','trip_decription','travelagency_id','source_id','destination_id','trip_pic'
     ];
     protected $primarykey = 'id';

     public function tripRounds(){
        return $this->hasMany('App\tripround','id');
     }
     public function stations(){
         return $this->belongsTo('App\station','source_id','destination_id');
     }

     public function travelagency(){
         return $this->belongsTo('App\travelagency','travelagency_id');
     }

     public function schedules(){
         return $this->hasMany('App\schedules','id');
     }



}
