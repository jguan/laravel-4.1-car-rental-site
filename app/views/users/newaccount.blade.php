@extends('layouts.main')

@section('content')

	<div id="new-account">

		<h1>Create New Account</h1>

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

		{{ Form::open(array('url'=>'users/create')) }}

		<p>
			{{ Form::label('firstname') }}
			{{ Form::text('firstname') }}
		</p>
		<p>
			{{ Form::label('lastname') }}
			{{ Form::text('lastname') }}
		</p>
		<p>
			{{ Form::label('email') }}
			{{ Form::text('email') }}
		</p>
		<p>
			{{ Form::label('password') }}
			{{ Form::password('password') }}
		</p>
		<p>
			{{ Form::label('password_confirmation') }}
			{{ Form::password('password_confirmation') }}
		</p>
		<p>
			{{ Form::label('telephone') }}
			{{ Form::text('telephone') }}
		</p>
		{{ Form::submit('CREATE NEW ACCOUNT', array('class'=>'secondary-cart-btn')) }}
		{{ Form::close() }}

	</div><!-- end new-account -->

@stop
