@extends('layouts.master')
@section('title')
	
@stop

@section('content')
	<h1>Add Employees</h1>
	<hr>
	<br>
{!! Form::hidden('user_id', 1) !!}	
	<!-- {!! Form::open(['url'=>'employees']) !!} -->
		{!! Form::open(['route' => 'employees.store'])!!}	

		<div class="form-group">
				{!! Form::label('emp_id', 'Employee ID:') !!}
				{!! Form::text('emp_id', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
				{!! Form::label('fname', 'Firstname:') !!}
				{!! Form::text('fname', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
				{!! Form::label('mname', 'Middlename:') !!}
				{!! Form::text('mname', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
				{!! Form::label('lname', 'lastname:') !!}
				{!! Form::text('lname', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
				{!! Form::label('address', 'Adress:') !!}
				{!! Form::text('address', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
				{!! Form::label('phone', 'Phone:') !!}
				{!! Form::text('phone', '', ['placeholder' => '+63','class' => 'form-control']) !!}
		</div>

		<div class="form-group">
				{!! Form::label('email', 'E-mail:') !!}
				{!! Form::text('email', '', ['placeholder' => 'example@gmail.com', 'class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			
			{!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}

	@if ($errors->any)
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@stop
