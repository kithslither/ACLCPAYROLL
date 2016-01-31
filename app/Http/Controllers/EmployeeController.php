<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Appointment;
use App\Title;
use App\Department;

use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->viewData['employees'] = Employee::all();
        
        return view('employees.index')->with($this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Employee::create([
            'employee_number' => $request->employee_number,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'highest_degree_earned' => $request->highest_degree_earned
        ]);

        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        $appointments = $employee->appointments;
        $totalHours = 0;

        foreach($appointments as $appointment){
            $totalHours += str_replace(":", ".", date("G:i", strtotime($appointment->appointment_end_date) - strtotime($appointment->appointment_begin_date)));
        }

        $this->viewData = [
            'employee'      => $employee,
            'appointments'  => $appointments,
            'totalHours'    => $totalHours,
            'titles'        => Title::all(),
            'departments'   => Department::all()
        ];

        return view('employees.show')->with($this->viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->viewData['employee'] = Employee::find($id);
        return view('employees.edit')->with($this->viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->employee_number = $request->employee_number;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->save();

        return redirect()->route('employees.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id)->delete();
        return redirect()->route('employees.index');
    }

    public function auth(Request $request)
    {
        $employee = Employee::where('employee_number', '=', $request->employee_number)->first();

        if($employee != null) {
            Session::put('employee_number', $employee->employee_number);
            return redirect('employees/dashboard');
        } else{
            return back();
        }

        
    }

    public function dashboard()
    {
        if(Session::has('employee_number')){

            $employee = Employee::where('employee_number', '=', Session::get('employee_number'))->first();
            $appointments = $employee->appointments;
            $totalHours = 0;
            $paidPaychecks = [];

            foreach($appointments as $appointment){
                $totalHours += str_replace(":", ".", date("G:i", strtotime($appointment->appointment_end_date) - strtotime($appointment->appointment_begin_date)));
            }

            $pendingPaychecks = $employee->paycheck_headers()->where('date_paid', '=', '0000-00-00 00:00:00')->get();
            $paidPaycheckHeaders = $employee->paycheck_headers()->where('date_paid', '!=', '0000-00-00 00:00:00')->get();

            if( ! $paidPaycheckHeaders->isEmpty()) {
                foreach($paidPaycheckHeaders as $paidPaycheckHeader){
                    $paidPaychecks[] = [
                        'header'        => $paidPaycheckHeader,
                        'detail'       => $paidPaycheckHeader->paycheck_detail,
                        'deductions'    => $paidPaycheckHeader->deductions
                    ];
                }
            }

            $this->viewData = [
                'employee'              => $employee,
                'appointments'          => $appointments,
                'totalHours'            => $totalHours,
                'paidPaychecks'         => $paidPaychecks,
                'pendingPaychecks'      => $pendingPaychecks
            ];

            return view('employees.dashboard')->with($this->viewData);
        } else {
            return redirect('/');
        }
    }

    public function leave()
    {
        Session::forget('employee_number');

        return redirect('/');
    }
}
