<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactus extends Model
{
    protected $table = 'contactUS';
    
        protected $fillable = ['name','email','admin_read'];
        protected $primarykey = 'id';

}
