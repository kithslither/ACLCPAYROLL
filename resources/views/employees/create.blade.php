@extends('layouts.master')
@section('title')
	
@stop

@section('content')
	<h1>Add Employees</h1>
	<hr>
	<br>
	<!-- {!! Form::open(['url'=>'employees']) !!} -->
	{!! Form::open(['route' => 'employees.store'])!!}	

		<div class="form-group">
			{!! Form::label('employee_number', 'Employee Number:') !!}
			{!! Form::text('employee_number', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('first_name', 'Firstname:') !!}
			{!! Form::text('first_name', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('last_name', 'lastname:') !!}
			{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('highest_degree_earned', 'Highest Degree Earned') !!}
			{!! Form::text('highest_degree_earned', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
@stop
