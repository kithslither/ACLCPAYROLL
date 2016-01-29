<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function employee(){
    	return $this->belongsTo('App\Employee');
    }

    public function title(){
    	return $this->belongsTo('App\Title');
    }

    public function department(){
    	return $this->belongsTo('App\Department');
    }

    public function deductions(){
    	return $this->hasMany('App\Deduction');
    }

    public function paycheck_headers(){
    	return $this->hasMany('App\PaycheckHeader');
    }

    public function paycheck_details(){
    	return $this->hasMany('App\PaycheckDetail');
    }
}
