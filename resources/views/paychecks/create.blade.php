@extends('layouts.master')
@section('title')
	
@stop

@section('content')
	<h1>Generate Paychecks</h1>
	<hr>
	<br>
	<!-- {!! Form::open(['url'=>'employees']) !!} -->
	{!! Form::open(['route' => 'paychecks.store'])!!}	

		<div class="form-group">
			{!! Form::label('check_number', 'Check Number:') !!}
			{!! Form::text('check_number') !!}
		</div>
		<div class="form-group">
			{!! Form::label('employee_id', 'Employee Name:') !!}
			<select name="employee_id" id="">
				@foreach($employees as $employee)
				<option value="{{ $employee->id }}">{{ $employee->first_name . " " . $employee->last_name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			{!! Form::label('pay_period_begin_date', 'From: ') !!}
			<input type="datetime-local" name="pay_period_begin_date">
			{!! Form::label('pay_period_end_date', 'To: ') !!}
			<input type="datetime-local" name="pay_period_end_date">
		</div>

		<div class="form-group">
			<h5>Deductions: </h5>
			@foreach($deductions as $deduction)
				<input type="checkbox" name="deduction_ids[]" value="{{ $deduction->id }}"> {{ $deduction->deduction_type . " - " . $deduction->amount }} <br>
			@endforeach
		</div>
		<div class="form-group">
			{!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
@stop
