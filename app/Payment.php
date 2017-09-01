<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Payment extends Model
{
    protected $table ="payments";
    protected $primarykey ='id';
    protected $fillale = ['name','amount','status'];
}
