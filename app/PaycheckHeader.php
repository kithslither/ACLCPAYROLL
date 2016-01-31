<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaycheckHeader extends Model
{

	protected $fillable = ['employee_id', 'check_number', 'pay_period_begin_date', 'pay_period_end_date', 'deduction_id'];

    public function paycheck_detail(){
    	return $this->hasOne('App\PaycheckDetail');
    }

    public function employee(){
    	return $this->belongsTo('App\Employee');
    }

    public function deductions(){
    	return $this->belongsToMany('App\Deduction', 'deduction_paycheck_header', 'paycheck_header_id', 'deduction_id');
    }

}
