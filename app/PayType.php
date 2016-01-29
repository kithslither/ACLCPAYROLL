<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayType extends Model
{
    public function paycheck_details(){
    	return $this->hasMany('App\PaycheckDetail');
    }
}
