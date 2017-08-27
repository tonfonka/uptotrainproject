<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedules extends Model
{
    protected $table ="schedules";
    public $timestamps = true;
    protected $primarykey ='id';
    protected $fillable =[
        'id','schedule_day','schedule_time','schedule_place',
        'schedule_description','trip_id','pic'
    ];
   

    public function trips(){
        return $this->belongsTo('App\trip','trip_id');
    }
}
