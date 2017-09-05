<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $table = "booking";
    protected $fillable = [
         'status'
     ];
     protected $primarykey = 'id';

}
