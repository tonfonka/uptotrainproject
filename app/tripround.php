<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tripround extends Model
{
    protected $table ="triprounds";
    public $timestamps = true;
    protected $fillale = ['id','start_date','departure_date','price_child','price_adult','amount_seats','triprounds_description','trip_id'];
    public function trips(){
        return $this->belongsTo('App\trip','trip_id');
    }
}
