@extends('layouts.main')

@section('content')

	<div id="admin">

		<h1>Cars Admin Panel</h1><hr>

		<p>Here you can edit selected car.</p>

		<h2>Edit Car</h2><hr>

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

		{{ Form::open(array('url'=>'admin/cars/update')) }}
		<p>
			{{ Form::label('type_id', 'Car Type') }}
			{{ Form::select('type_id', $car_types, $car->type_id) }}
		</p>
		<p>
			{{ Form::label('title') }}
			{{ Form::text('title', $car->title) }}
		</p>
		<p>
			{{ Form::label('description') }}
			{{ Form::textarea('description', $car->description) }}
		</p>
		<p>
			{{ Form::label('price') }}
			{{ Form::text('price', $car->price, array('class'=>'form-price')) }}
		</p>
		<p>
			{{ Form::label('available_at', 'Available at') }}
			{{ Form::text('available_at', $car->available_at) }}
		</p>
		<p>
			{{ Form::label('transmission', 'Transmission') }}
			{{ Form::select('transmission', $transmission, $car->transmission) }}
		</p>
		<p>
			{{ Form::label('aircon', 'Air Conditioning') }}
			{{ Form::select('aircon', $aircon, $car->aircon) }}
		</p>
		<p>
			{{ Form::label('seats', 'Seats') }}
			{{ Form::select('seats', $seats, $car->seats) }}
		</p>
		<p>
			{{ Form::label('doors', 'Doors') }}
			{{ Form::select('doors', $doors, $car->doors) }}
		</p>
		{{ Form::hidden('id', $car->id) }}
		{{ Form::submit('Edit Car', array('class'=>'secondary-cart-btn')) }}
		{{ Form::close() }}
	</div><!-- end admin -->

@stop
