<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Deduction;
use App\PaycheckHeader;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PaycheckController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->viewData = [
            'employees' => Employee::all(),
            'deductions' => Deduction::all()
        ];

        return view('paychecks.create')->with($this->viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PaycheckHeader::create([
            'employee_id' => $request->employee_id,
            'check_number' => $request->check_number,
            'pay_period_begin_date' => $request->pay_period_begin_date,
            'pay_period_end_date' => $request->pay_period_end_date,
            'deduction_id' => $request->deduction_id
        ]);

        return redirect('employees');
    }
}
