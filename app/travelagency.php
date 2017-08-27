<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class travelagency extends Model
{
    protected $table ="travelagency";
    public $timestamps = true;
    protected $fillable=[
        'id','agency_name_contact','agency_contact_phone',
        'agency_contact_email','agency_password','agency_name_th',
        'agency_name_en','agency_license','agency_iata_no',
        'agency_tax_id','agency_address','agency_province',
        'agency_zipcode','agency_tel1','agency_tel2',
        'agency_fax','agency_email','agency_web','agency_fb',
        'agency_description'
    ];
    protected $primarykey ='id';
    public function trips(){
        return $this->hasMany('App\trip','id');
    }
}
