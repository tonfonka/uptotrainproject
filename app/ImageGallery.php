<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    protected $table = 'imagegallery';
    
        protected $fillable = ['title','image','trip_id'];
        protected $primarykey = 'id';


        public function trips(){
            return $this->belongsTo('App\trip','id');
        }

}
