@extends('layouts.master')
@section('title')
	
@stop

@section('content')
	<h1>Add Employees</h1>
	<br>
	{!! Form::model($employee, ['method' => 'patch', 'route' => ['employees.update', $employee->id]]) !!}

		<div class="form-group">
			{!! Form::label('employee_number', 'Employee ID:') !!}
			{!! Form::text('employee_number',  $employee->employee_number, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('first_name', 'Firstname:') !!}
			{!! Form::text('first_name', $employee->first_name, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('last_name', 'lastname:') !!}
			{!! Form::text('last_name', $employee->last_name, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
@stop
