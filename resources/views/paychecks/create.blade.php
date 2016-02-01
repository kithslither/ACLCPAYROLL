@extends('layouts.master')
@section('title')
	
@stop

@section('content')
	<h1>Generate Paychecks</h1>
	<hr>
	<br>
	<!-- {!! Form::open(['url'=>'employees']) !!} -->
	{!! Form::open(['route' => 'paychecks.store'])!!}	
	<div class="row">
		<div class="form-group">
			<div class="col-sm-6">
			{!! Form::label('check_number', 'Check Number:') !!}
			{!! Form::text('check_number', null, ['class' => 'form-control']) !!}
			<!-- {!! Form::text('employee_number', null, ['class' => 'form-control']) !!} -->
			</div>
		</div>
	</div>	

	<div class="row">	
		<div class="form-group">
			<div class="col-sm-6">
			{!! Form::label('employee_id', 'Employee Name:') !!}
			<select class="form-control" name="employee_id" id="">
				@foreach($employees as $employee)
				<option value="{{ $employee->id }}" >{{ $employee->first_name . " " . $employee->last_name }}</option>
				@endforeach
			</select>
			</div>
		</div>	
	</div>

	<div class="row">
		<div class="form-group">
			<div class="col-sm-3">
				{!! Form::label('pay_period_begin_date', 'From: ') !!}
			</div>
			<div class="col-sm-3">	
				{!! Form::label('pay_period_end_date', 'To: ') !!}
			</div>
	</div>
	</div>
	<div class="row">		
			<div class="col-sm-3">	
				<input class="form-control" type="datetime-local" name="pay_period_begin_date">
			</div>
			<div class="col-sm-3">	
				<input class="form-control" type="datetime-local" name="pay_period_end_date">
			</div>
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
