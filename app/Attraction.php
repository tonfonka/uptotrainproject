<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
     protected $table = "attraction";
    protected $fillable = [
         'attraction_ID','attraction_Name', 'attraction_Description', 'attraction_Time_Open','Attraction_Time_Closed','Attraction_Distance','Attraction_Province','Attraction_tambon','Attraction_State','Attraction_Zipcode','Attraction_Tel','Attraction_pic',
         'goByCar',
         'goByBus'
     ];
     protected $primarykey = 'attraction_ID';
}
