<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    protected $table = 'imagegallery';
    
        protected $fillable = ['image','sch_id'];
        protected $primarykey = 'id';


        public function trips(){
            return $this->belongsTo('App\trip','id');
        }
        // public function schedules(){
        //     return $this->belongsTo('App\schedules','id');
        // }

}
