@extends('layouts.main')

@section('search-keyword')

	<hr>
	<section id="search-keyword">
        <h1>Search Results for <span>{{ $keyword }}</span></h1>
    </section><!-- end search-keyword -->

@stop

@section('content')

	<div id="search-results">

		@foreach($cars as $car)
        <div class="product">
            
            {{ HTML::image($car->image, $car->title, array('class'=>'feature', 'width'=>'220', 'height'=>'128')) }}

            <h3>{{ $car->title }}</h3>

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

            <p>
                {{ Form::open(array('url'=>'store/book-car')) }}
                {{ Form::hidden('id', $car->id) }}
                <button type="submit" class="cart-btn">
                    <span class="price">${{ $car->price }}/DAY</span> BOOK NOW
                </button>
                {{ Form::close() }}
            </p>
        </div>
        @endforeach

	</div><!-- end search-results -->

@stop
