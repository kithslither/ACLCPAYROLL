@extends('layouts.master')


@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Employees
            </h1>
            <!-- START TABS -->
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#info"><i class="glyphicon glyphicon-user"></i> Information</a></li>
                <li><a href=" ">Add Employee</a></li>
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
                        <div class="col-lg-6"><h3>Information</h3></div>
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
                        @foreach($employees as $employee)
                        <div class="col-lg-3">
                            <div class="panel panel-default">

                                <div class="panel-body">
                                    <!-- <img class="emp_thumb"src="images/Legaspi M.jpg"/> -->
                                    <h4>{{ $employee->first_name . " " . $employee->last_name }}</h4>
                                    <p>Employee #: {{ $employee->employee_number }}</p>
                                    
                                        {!! Html::linkRoute('employees.show', 'Details', array($employee->id), array('class' => 'btn btn-success')) !!}
                                        {!! Html::linkRoute('employees.edit', 'Edit', array($employee->id), array('class' => 'btn btn-primary')) !!}

                                        {!! Form::model($employee, ['method' => 'delete', 'route' => ['employees.destroy', $employee->id], 'style' => 'display: inline;']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach			
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


