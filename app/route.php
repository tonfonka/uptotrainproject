<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class route extends Model
{
    protected $table ="routes";
    public $timestamps = true;
    protected $fillable = [
         'id','routes_name'
     ];
      protected $primarykey = 'id';
       public function stations(){
        return $this->hasMany('App\station','id');
     }
     
}
