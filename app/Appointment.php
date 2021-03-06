<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $fillable = ['employee_id', 'title_id', 'department_id', 'appointment_begin_date', 'appointment_end_date'];

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

    public function paycheck_details(){
    	return $this->hasMany('App\PaycheckDetail');
    }
}
