<?php

namespace App\omise;


use Illuminate\Database\Eloquent\Model;


require_once '/Applications/MAMP/htdocs/uptotraineiei/app/omise/lib/Omise.php';

class chashier extends Model
{
    public static function charge(Array $data)
    {
        return \OmiseCharge::create($data);
    }
}
