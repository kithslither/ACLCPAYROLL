<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Deduction;
use App\PaycheckHeader;
use App\PayType;
use App\PaycheckDetail;
use App\Appointment;
use Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PaycheckController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->viewData['paychecks'] = PaycheckHeader::all();
        $this->viewData = [
            'paychecks'     => PaycheckHeader::all(),
            'payTypes'      => PayType::all()
        ];
        
        return view('paychecks.index')->with($this->viewData);
    }

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
        $paycheckHeader = PaycheckHeader::create([
            'employee_id' => $request->employee_id,
            'check_number' => $request->check_number,
            'pay_period_begin_date' => $request->pay_period_begin_date,
            'pay_period_end_date' => $request->pay_period_end_date
        ]);

        $paycheckHeader->deductions()->attach($request->deduction_ids);

        return redirect('employees');
    }

    public function pay(Request $request)
    {
        $paycheckHeader = PaycheckHeader::find($request->paycheck_header_id);
        $paycheckHeader->date_paid = Carbon\Carbon::now()->toDateTimeString();
        $paycheckHeader->save();

        Appointment::where('employee_id', '=', $request->employee_id)->where('status', 0)->update(['status' => 1]);

        PaycheckDetail::create([
            'amount'                => $request->amount,
            'pay_type_id'           => $request->pay_type_id,
            'paycheck_header_id'    => $request->paycheck_header_id
        ]);

        return redirect('paychecks');
    }
}
