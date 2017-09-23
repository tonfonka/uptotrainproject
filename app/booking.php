<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $table = "booking";
    protected $fillable = [
         'number_adults','number_children','number_booking','total_cost','	booking_time','	tripround_id','user_id','status'
     ];
     protected $primarykey = 'id';

     public function tripround(){
        return $this->belongsTo('App\tripround','id');
    }

}
