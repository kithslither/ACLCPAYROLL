<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $fillable = ['employee_number', 'first_name', 'last_name', 'highest_degree_earned'];

    public function appointments(){
    	return $this->hasMany('App\Appointment');
    }

    public function paycheck_headers(){
    	return $this->hasMany('App\PaycheckHeader');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
