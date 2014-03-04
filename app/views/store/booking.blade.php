@extends('layouts.main')

@section('content')

	<div id="booking">
        <h2>Confirm Booking</h1>

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

        <div class="product">            
            {{ HTML::image($car->image, $car->title, array('class'=>'feature', 'width'=>'220', 'height'=>'128')) }}

            <h3>{{ $car->title }}</h3>

            <p>{{ $car->description }}</p>

            <h5>
                Seats: <span>{{ $car->seats }}</span><br>
                Doors: <span>{{ $car->doors }}</span><br>
                Air Conditioning:
                <span class="{{ Utility::displayClass($car->aircon) }}">
                    @if($car->aircon)
                        Yes
                    @else
                        No
                    @endif
                </span><br>
                Transmission:
                <span class="{{ Utility::displayClass($car->transmission) }}">
                    @if($car->transmission)
                        Automatic
                    @else
                        Manual
                    @endif
                </span><br>
                Available on
                <span class="{{ Utility::displayClass($car->available_at <= date("Y-m-d H:i:s")) }}">
                    @if($car->available_at <= date("Y-m-d H:i:s"))
                        Now
                    @else
                        {{ date('d/m/Y', strtotime($car->available_at)) }}
                    @endif
                </span>
            </h5>
        </div>

        {{ Form::open(array('url'=>'bookings/create')) }}
        {{ Form::hidden('car_id', $car->id) }}
        {{-- Form::hidden('user_id', Auth::user()->id) --}}
        <p>
        {{ Form::label('pick_up_date', 'Pick Up') }}<br>
        <span>{{ Form::text('pick_up_date', date('Y-m-d'), array('id' => 'pickup')) }}</span><br>
        {{ Form::label('drop_off_date', 'Drop Off') }}<br>
        {{ Form::text('drop_off_date', date('Y-m-d'), array('id' => 'dropoff')) }}
        </p>
        {{ Form::submit('Confirm', array('class'=>'secondary-cart-btn')) }}
        <a href="/"><input type="button" value="Cancel" class="tertiary-btn" /></a>
        {{ Form::close() }}

    </div><!-- end booking -->

@stop
