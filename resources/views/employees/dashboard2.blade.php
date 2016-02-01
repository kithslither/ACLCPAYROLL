@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Clock In History <a href="/employees/leave"><span class="pull-right">Leave</span></a></div>

                <div class="panel-body">
                    @if($appointments != null)
                    <h5>Total: <strong>{{ $totalHours }}</strong></h5>
                    <table class="table">
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
                    </table>
                    @else
                        No items to display
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Pending Paychecks</div>
                <div class="panel-body">
                    @if($pendingPaychecks != null)
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Check Number</td>
                                <td>Pay Period</td>
                                <td>Total Hours</td>
                                <td>Deduction</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pendingPaychecks as $pendingPaycheck)
                            <tr>
                                <td>{{ $pendingPaycheck->check_number }}</td>
                                <td>{{ date("M d Y", strtotime($pendingPaycheck->pay_period_begin_date)) . " - " . date("M d Y", strtotime($pendingPaycheck->pay_period_end_date)) }}</td>
                                <td>
                                    <?php 
                                        $totalHours = 0;
                                        $appointments = $pendingPaycheck->employee->appointments()->where('status', 0)->get();
                                    ?>
                                    @foreach($appointments as $appointment)
                                    <?php
                                        $totalHours += str_replace(":", ".", date("G:i", strtotime($appointment->appointment_end_date) - strtotime($appointment->appointment_begin_date)));
                                    ?>
                                    @endforeach
                                    {{ $totalHours }}                                    
                                </td>
                                <td>
                                    @if( ! $pendingPaycheck->deductions->isEmpty())
                                        <ul>
                                        @foreach($pendingPaycheck->deductions as $deduction)
                                            <li>{{ $deduction->deduction_type . " - " . $deduction->amount }}</li>
                                        @endforeach
                                        </ul>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        No items to display
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Paid Paychecks</div>
                <div class="panel-body">
                    @if($paidPaychecks != null)
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Check Number</td>
                                <td>Amount</td>
                                <td>Pay Type</td>
                                <td>Date Paid</td>
                                <td>Deductions</td>
                            </tr>
                        </thead>
                        <tbody>
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
                        </tbody>
                    </table>
                    @else
                        No items to display
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
