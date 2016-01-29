<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Appointment::create([
            'employee_id'               => $request->employee_id,
            'title_id'                  => $request->title_id,
            'department_id'             => $request->department_id, 
            'appointment_begin_date'    => $request->appointment_begin_date,
            'appointment_end_date'      => date("Y-m-d H:i:s", strtotime($request->appointment_end_date))
        ]);
        return redirect()->route('employees.show', [$request->employee_id]);
    }

}
