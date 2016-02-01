@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Butuan Information Services Inc. <a href="/employees/leave"><span class="pull-right">Leave</span></a></div>

                <div class="panel-body">
                   <!--  @if($appointments != null) -->

                    <h1>{{ Auth::user()->name }}</h1>
                    <h1></h1>

                    <!-- <h5>Total: <strong>{{ $totalHours }}</strong></h5> -->
                    <!-- <table class="table">
                        <thead>
                            <tr>
                                <th>Work Date</th>
                                <th>Clock In</th>
                                <th>Clock Out</th>
                                <th>Hours</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ date("M d, Y", strtotime($appointment->created_at)) }}</td>
                                    <td>{{ date("g:i A", strtotime($appointment->appointment_begin_date)) }}</td>
                                    <td>{{ date("g:i A", strtotime($appointment->appointment_end_date)) }}</td>
                                    <td>{{ date("G:i", strtotime($appointment->appointment_end_date) - strtotime($appointment->appointment_begin_date)) }}</td>
                                    <td>{{ $appointment->title->title_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> -->
                    <!-- @else
                        No items to display
                    @endif -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Payroll</div>
                <div class="panel-body">
                   <!--  @if($pendingPaychecks != null) -->
                    <table class="table">
                        <thead>
                            <tr>
                                <td></td>
                                <td>Payroll Date</td> <!-- the date the payroll was made -->
                                <td>Cut-off</td>      <!-- the cut-off date, example: jan 1 - 15, 2016 or jan 16-31, 2016 -->  
                                <td>Status</td>       <!-- if full time or part time -->
                            </tr>
                        </thead>
                        
                    </table>
                   <!--  @else
                        No items to display
                    @endif -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Paycheck</div>
                    <div class="panel-body">
                   <!--  @if($paidPaychecks != null) -->
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Monthly Basic</td>
                                <td>14,500</td>
                            </tr>
                            <tr>
                                <td>Regular Earnings</td>
                                <td>5,700</td>
                            </tr>
                            <tr>
                                <td>Honorarium</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>Overtime</td>
                                <td>200</td>
                            </tr>
                            <tr class="danger">
                                <td ><h4>Total</h4></td>
                                <td><h4>5,950</h4></td>
                            </tr>

                        </thead>
                        <!-- <tbody>
                        @foreach($paidPaychecks as $paidPaycheck)
                            <tr>
                                <td>{{ $paidPaycheck['header']->check_number }}</td>
                                <td>{{ $paidPaycheck['detail']->amount }}</td>
                                <td>{{ $paidPaycheck['detail']->pay_type->pay_type_name }}</td>
                                <td>{{ date("M d Y", strtotime($paidPaycheck['header']->date_paid)) }}</td>
                                <td>
                                    @if( ! $paidPaycheck['deductions']->isEmpty())
                                        <ul>
                                        @foreach($paidPaycheck['deductions'] as $deduction)
                                            <li>{{ $deduction->deduction_type . " - " . $deduction->amount }}</li>
                                        @endforeach
                                        </ul>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody> -->
                    </table>
                  <!--   @else
                        No items to display
                    @endif -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Less</div>
                    <div class="panel-body">
                  <!--   @if($paidPaychecks != null) -->
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Undertime     </td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>Lates</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>Absences</td>
                                <td>70</td>
                            </tr>
                            <tr class="danger">
                                <td>Total</td>
                                <td>200</td>
                            </tr>
                            <tr class="success">
                                <td>Gross Pay</td>
                                <td>5880</td>
                            </tr>
                        </thead>
                        <!-- <tbody>
                        @foreach($paidPaychecks as $paidPaycheck)
                            <tr>
                                <td>{{ $paidPaycheck['header']->check_number }}</td>
                                <td>{{ $paidPaycheck['detail']->amount }}</td>
                                <td>{{ $paidPaycheck['detail']->pay_type->pay_type_name }}</td>
                                <td>{{ date("M d Y", strtotime($paidPaycheck['header']->date_paid)) }}</td>
                                <td>
                                    @if( ! $paidPaycheck['deductions']->isEmpty())
                                        <ul>
                                        @foreach($paidPaycheck['deductions'] as $deduction)
                                            <li>{{ $deduction->deduction_type . " - " . $deduction->amount }}</li>
                                        @endforeach
                                        </ul>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody> -->
                    </table>
                   <!--  @else
                        No items to display
                    @endif -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">deductions</div>
                    <div class="panel-body">
                <!--     @if($paidPaychecks != null) -->
                    <table class="table">
                        <thead>
                            <tr>
                                <td>SSS Contribution</td>
                                <td>500</td>
                            </tr>
                            <tr>
                                <td>Pag-ibig Contribution</td>
                                <td>500</td>
                            </tr>
                            <tr>
                                <td>Philhealth</td>
                                <td>580</td>
                            </tr>
                            <tr>
                                <td>SSS Loan</td>
                                <td>500</td>
                            </tr>
                            <tr>
                                <td>Pag-ibig Loan</td>
                                <td>500</td>
                            </tr>
                            <tr>
                                <td>Cash Advance</td>
                                <td>500</td>
                            </tr>
                            <tr>
                                <td>Canteen Vale</td>
                                <td>385</td>
                            </tr>
                            <tr class="danger">
                                <td>Gross Deductions</td>
                                <td>3,465</td>
                            </tr>
                            <tr class="success">
                                <td><h3>NET Pay</h3></td>
                                <td><h3>2,415</h3></td>
                            </tr>
                        </thead>
                        <!-- <tbody>
                        @foreach($paidPaychecks as $paidPaycheck)
                            <tr>
                                <td>{{ $paidPaycheck['header']->check_number }}</td>
                                <td>{{ $paidPaycheck['detail']->amount }}</td>
                                <td>{{ $paidPaycheck['detail']->pay_type->pay_type_name }}</td>
                                <td>{{ date("M d Y", strtotime($paidPaycheck['header']->date_paid)) }}</td>
                                <td>
                                    @if( ! $paidPaycheck['deductions']->isEmpty())
                                        <ul>
                                        @foreach($paidPaycheck['deductions'] as $deduction)
                                            <li>{{ $deduction->deduction_type . " - " . $deduction->amount }}</li>
                                        @endforeach
                                        </ul>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody> -->
                    </table>
                   <!--  @else
                        No items to display
                    @endif -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
