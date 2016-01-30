<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaycheckDetail extends Model
{
	protected $fillable = ['amount', 'pay_type_id', 'paycheck_header_id'];

    public function paycheck_header(){
    	return $this->belongsTo('App\PaycheckHeader');
    }

    public function pay_type(){
    	return $this->belongsTo('App\PayType');
    }
}
