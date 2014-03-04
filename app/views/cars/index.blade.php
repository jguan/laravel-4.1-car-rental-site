@extends('layouts.main')

@section('content')

	<div id="admin">

		<h1>Cars Admin Panel</h1><hr>

		<p>Here you can view, delete, and create new cars.</p>

		<h2>Cars</h2><hr>

		<ul>
			@foreach($cars as $car)
				<li>
					{{ HTML::image($car->image, $car->title, array('width'=>'50')) }}
					{{ $car->title }} ({{ $car->carType->name }}) -
					{{ Form::open(array('url'=>'admin/cars/destroy', 'class'=>'form-inline')) }}
					{{ Form::hidden('id', $car->id) }}
					{{ Form::submit('delete') }}
					{{ Form::close() }} - 
                    <a href="/admin/cars/edit/{{ $car->id }}"><input type="button" value="edit" class="edit" /></a>
				</li>
			@endforeach
		</ul>

		<h2>Create New Car</h2><hr>

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

		{{ Form::open(array('url'=>'admin/cars/create', 'files'=>true)) }}
		<p>
			{{ Form::label('type_id', 'Car Type') }}
			{{ Form::select('type_id', $car_types) }}
		</p>
		<p>
			{{ Form::label('title') }}
			{{ Form::text('title') }}
		</p>
		<p>
			{{ Form::label('description') }}
			{{ Form::textarea('description') }}
		</p>
		<p>
			{{ Form::label('price') }}
			{{ Form::text('price', null, array('class'=>'form-price')) }}
		</p>
		<p>
			{{ Form::label('available_at', 'Available at') }}
			{{ Form::text('available_at', $available_at) }}
		</p>
		<p>
			{{ Form::label('transmission', 'Transmission') }}
			{{ Form::select('transmission', $transmission) }}
		</p>
		<p>
			{{ Form::label('aircon', 'Air Conditioning') }}
			{{ Form::select('aircon', $aircon) }}
		</p>
		<p>
			{{ Form::label('seats', 'Seats') }}
			{{ Form::select('seats', $seats) }}
		</p>
		<p>
			{{ Form::label('doors', 'Doors') }}
			{{ Form::select('doors', $doors) }}
		</p>
		<p>
			{{ Form::label('image', 'Choose an image') }}
			{{ Form::file('image') }}
		</p>
		{{ Form::submit('Add Car', array('class'=>'secondary-cart-btn')) }}
		{{ Form::close() }}
	</div><!-- end admin -->

@stop
