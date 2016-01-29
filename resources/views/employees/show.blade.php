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
	<div class="col-lg-6">
		<p><strong>Employee Number: </strong>{{ $employee->employee_number }}</p>
		<p><strong>First Name: </strong>{{ $employee->first_name }}</p>
		<p><strong>Last Name: </strong>{{ $employee->last_name }}</p>
	</div>
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
				<?php 
					$start = $appointment->appointment_begin_date;
					$end = $appointment->appointment_end_date;
				?>
				<tr>
					<td>{{ date("M d, Y", strtotime($appointment->created_at)) }}</td>
					<td>{{ date("g:i A", strtotime($start)) }}</td>
					<td>{{ date("g:i A", strtotime($end)) }}</td>
					<td>{{ date("G:i", strtotime($end) - strtotime($start)) }}</td>
					<td>{{ $appointment->title->title_name }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
</div>
</div>
@stop
