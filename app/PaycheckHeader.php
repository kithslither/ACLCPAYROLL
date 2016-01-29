<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaycheckHeader extends Model
{
    public function paycheck_details(){
    	return $this->hasMany('App\PacheckDetail');
    }

    public function appointment(){
    	return $this->belongsTo('App\Appointment');
    }
}
