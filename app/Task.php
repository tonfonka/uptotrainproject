<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;



class Task extends Model
{
    protected $fillable =['title','body'];
    
}
