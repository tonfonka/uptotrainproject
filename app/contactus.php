<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactus extends Model
{
    protected $table = 'contactUS';
    
        protected $fillable = ['name','email','phone','admin_read','updated_at'];
        protected $primarykey = 'id';

}
