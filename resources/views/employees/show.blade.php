@extends('layouts.master')
@section('content')

<div class="container-fluid">
<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Employee Details
            </h1>
                       
        </div>
</div>
<div class="row">
	<div class="row">
		<div class="col-lg-6">
			<p><strong>Employee Number: </strong>{{ $employee->employee_number }}</p>
			<p><strong>First Name: </strong>{{ $employee->first_name }}</p>
			<p><strong>Last Name: </strong>{{ $employee->last_name }}</p>
		</div>
	</div>
	{!! Form::open(array('method' =>'post', 'url' => 'appointments')) !!}
		{!! Form::hidden('employee_id', $employee->id) !!}
		<div class="form-group">
			{!! Form::label('appointment_begin_date', 'Clock In:') !!}
			<input type="datetime-local" name="appointment_begin_date">
		</div>
		<div class="form-group">
			{!! Form::label('appointment_end_date', 'Clock Out:') !!}
			<input type="datetime-local" name="appointment_end_date">
		</div>
		<div class="form-group">
			{!! Form::label('title_id', 'Title') !!}
			<select name="title_id" id="">
				@foreach($titles as $title)
					<option value="{{ $title->id }}">{{ $title->title_name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			{!! Form::label('title_id', 'Title') !!}
			<select name="department_id" id="">
				@foreach($departments as $department)
					<option value="{{ $department->id }}">{{ $department->department_name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			{!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
	<h4>Total: {{ $totalHours }} hours</h3>
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
</div>
</div>
</div>
@stop
