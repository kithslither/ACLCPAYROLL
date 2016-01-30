@extends('layouts.master')


@section('content')

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
    $(document).ready(function(){
        
        $("#rate").change(function(){
            var amount = ($(this).val() * $("#total_hours").text()) - $("#deduction").text()
            $("#amount").text(amount);
            $("#hidden_amount").val(amount);
        });
    });
</script>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Employees
            </h1>
            <!-- START TABS -->
            <ul class="nav nav-tabs">
                <li>{!! Html::linkRoute('employees.index', 'Employees', []) !!}</li>
                <li>{!! Html::linkRoute('employees.create', 'Add Employee', []) !!}</li>
                <li>{!! Html::linkRoute('paychecks.create', 'Generate Paycheck', []) !!}</li>
                <li class="active">
                    <a href="#">Paychecks</a>
                </li>
                <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a data-toggle="tab" href="#dropdown1">Dropdown1</a></li>
                        <li><a data-toggle="tab" href="#dropdown2">Dropdown2</a></li>
                    </ul>
                </li>
            </ul>
            <div class="tab-content">
                <div id="info" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-lg-6"><h3>Paychecks</h3></div>
                        <div class="col-lg-6">
                            <form role="search" class="navbar-form navbar-right">
                                <div class="form-group">
                                    <input type="text" placeholder="Search" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                            </form>
                        </div> 
                    </div>
                    <hr>
                    <!-- Thumbs start here -->
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Paycheck ID</th>
                                    <th>Check Number</th>
                                    <th>Full Name</th>
                                    <th>Pay Period</th>
                                    <th>Rate per Hour</th>
                                    <th>Deduction</th>
                                    <th>Total hours</th>
                                    <th>Amount</th>
                                    <th>Pay Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paychecks as $paycheck)
                                <tr>
                                    <td>{{ $paycheck->id }}</td>
                                    <td>{{ $paycheck->check_number }}</td>
                                    <td>{{ $paycheck->employee->first_name . " " . $paycheck->employee->last_name }}</td>
                                    <td>{{ date("M d Y", strtotime($paycheck->pay_period_begin_date)) . " - " . date("M d Y", strtotime($paycheck->pay_period_end_date)) }}</td>
                                    <td>
                                        <input type="number" id="rate">
                                    </td>
                                    <td id="deduction">
                                        <?php $deductionAmount = 0; ?>
                                        @foreach($paycheck->deductions as $deduction)
                                            <?php $deductionAmount += $deduction->amount; ?>
                                        @endforeach
                                        {{ $deductionAmount }}
                                    </td>
                                    <td id="total_hours">
                                        <?php 
                                            $totalHours = 0;
                                            $appointments = $paycheck->employee->appointments()->where('status', 0)->get();
                                        ?>
                                        @foreach($appointments as $appointment)
                                        <?php
                                            $totalHours += str_replace(":", ".", date("G:i", strtotime($appointment->appointment_end_date) - strtotime($appointment->appointment_begin_date)));
                                        ?>
                                        @endforeach
                                        {{ $totalHours }}
                                    </td>
                                    <td id="amount">0</td>
                                    <td>
                                        {!! Form::open(['url' => 'paychecks/pay'])!!}
                                            <select name="pay_type_id" id="">
                                                @foreach($payTypes as $payType)
                                                <option value="{{ $payType->id }}">{{ $payType->pay_type_name }}</option>
                                                @endforeach
                                            </select>
                                            {!! Form::hidden('employee_id', $paycheck->employee->id) !!}
                                            {!! Form::hidden('paycheck_header_id', $paycheck->id) !!}
                                            {!! Form::hidden('amount', null, array("id" => "hidden_amount")) !!}     
                                    </td>
                                    <td>
                                        @if($paycheck->date_paid == "0000-00-00 00:00:00")

                                            {!! Form::submit('Pay', ['class' => 'btn btn-primary form-control']) !!}
                                        {!! Form::close() !!}
                                        @else
                                            <button class="btn btn-primary" disabled>Paid</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>		
                    </div>
                    <!-- Thumbs end here -->
                    <div id="add" class="tab-pane fade">

                        <div class="row">
                            <div class="col-lg-6"><h3>Add Employee</h3></div>
                            <br><br><br>
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><label>Employee ID</label></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3"><input class="form-control" placeholder="ID"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6"><label>Name</label></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3"><input class="form-control" placeholder="Last"></div>
                            <div class="col-lg-3"><input class="form-control" placeholder="First"></div>
                            <div class="col-lg-3"><input class="form-control" placeholder="Middle"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6"><label>Password</label></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><input class="form-control" placeholder="Password"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6"><label>Confirm password</label></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><input class="form-control" placeholder="Confirm password"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6"><label>Address</label></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12"><input class="form-control" placeholder="Address"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6"><label>Birthday</label></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1">
                                <select class="form-control">
                                    <option>Date</option>
                                </select>
                            </div>
                            <div class="col-lg-1">
                                <select class="form-control">
                                    <option>Month</option>
                                </select>
                            </div>
                            <div class="col-lg-1">
                                <select class="form-control">
                                    <option>Year</option>
                                </select>
                            </div> 
                            <br>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-2"><label>Gender</label></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1"><label class="checkbox-inline"><input type="checkbox">Male</label></div>
                            <div class="col-lg-1"><label class="checkbox-inline"><input type="checkbox">Female</label></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6"><label>Contact Number</label></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3"><input class="form-control" placeholder="+63"></div>
                            <div class="col-lg-3"><input class="form-control" placeholder="+63"></div>
                        </div>
                        <div class="row">
                            <br>
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Reset</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="details" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Details</h4>
                                </div>
                                <div class="modal-body">
                                    <p></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target='#Edit'>Edit</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="dropdown1" class="tab-pane fade">
                        <h3>Dropdown 1</h3>
                        <p>WInteger convallis, nulla in sollicitudin placerat, ligula enim auctor lectus, in mollis diam dolor at lorem. Sed bibendum nibh sit amet dictum feugiat. Vivamus arcu sem, cursus a feugiat ut, iaculis at erat. Donec vehicula at ligula vitae venenatis. Sed nunc nulla, vehicula non porttitor in, pharetra et dolor. Fusce nec velit velit. Pellentesque consectetur eros.</p>
                    </div>
                    <div id="dropdown2" class="tab-pane fade">
                        <h3>Dropdown 2</h3>
                        <p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
                    </div>
                </div>
            <!-- END TABS -->
            </div>
        </div>
    </div>
</div>
@stop


