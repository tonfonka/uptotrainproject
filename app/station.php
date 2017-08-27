<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class station extends Model
{
    protected $table ="stations";
    public $timestamps = true;
    protected $fillable = [
        'id','station_name','station_province','station_description','routes_id'
    ];
    protected $primarykey ="id";
    public function routes(){
        return $this->belongsTo('App\route','routes_id');
    }
    public function trips(){
        return $this->hasMany('App\trip','id');
    }
}
