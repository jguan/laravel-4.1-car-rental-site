@extends('layouts.main')

@section('promo')

    <section id="promo">
        <div id="promo-details">
            <h1>Today's Deals</h1>
            <p>Checkout this section <br />for our promotion.</p>
        </div><!-- end promo-details -->
        {{ HTML::image('img/promo.png', 'Promotional Ad') }}
    </section><!-- promo -->

@stop

@section('content')

	<h2>{{ $car_type->name }} Cars</h2>
    <hr>

    <aside id="categories-menu">
        <h3>CAR TYPES</h3>
        <ul>
            @foreach($typenav as $type)
                <li>{{ HTML::link('/store/car-type/'.$type->id, $type->name) }}</li>
            @endforeach
        </ul>
    </aside><!-- end categories-menu -->

    <div id="listings">

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

	</div><!-- end listings -->

@stop

@section('pagination')

	<section id="pagination">
		{{ $cars->links() }}
	</section><!-- end pagination -->

@stop
