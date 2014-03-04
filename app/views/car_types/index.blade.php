@extends('layouts.main')

@section('content')

	<div id="admin">

		<h1>Car Types Admin Panel</h1><hr>

		<p>Here you can view, delete, and create new car types.</p>

		<h2>Car Types</h2><hr>

		<ul>
			@foreach($car_types as $type)
				<li>
					{{ $type->name }} -
					{{ Form::open(array('url'=>'admin/car_types/destroy', 'class'=>'form-inline')) }}
					{{ Form::hidden('id', $type->id) }}
					{{ Form::submit('Delete') }}
					{{ Form::close() }}
				</li>
			@endforeach
		</ul>

		<h2>Create New Car Type</h2><hr>

		@if($errors->has())
		<div id="form-errors">
			<p>The following errors have occurred:</p>

			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div><!-- end form-errors -->
		@endif

		{{ Form::open(array('url'=>'admin/car_types/create')) }}
		<p>
			{{ Form::label('name') }}
			{{ Form::text('name') }}
		</p>
		{{ Form::submit('Create Car Type', array('class'=>'secondary-cart-btn')) }}
		{{ Form::close() }}
	</div><!-- end admin -->

@stop
