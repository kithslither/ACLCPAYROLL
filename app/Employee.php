<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function appointments(){
    	return $this->hasMany('App\Appointment');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}