<?php

class BookingsController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('getIndex', 'postCreate', 'postCancel')));
		$this->beforeFilter('admin', array('only'=>array('getManage', 'postManage')));
	}

	public function getIndex() {
		return View::make('bookings.index')
			->with('bookings', Booking::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10));
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Booking::$rules);

		if ($validator->passes()) {
			$booking = new Booking;
			$booking->car_id = Input::get('car_id');
			$booking->user_id = Auth::user()->id;
			$booking->book_from = Input::get('pick_up_date');
			$booking->book_to = Input::get('drop_off_date');
			$booking->save();

			return Redirect::to('bookings')
				->with('message', 'Your booking has sent to us. Thank you!');
		}

		return Redirect::back()
			->with('message', 'Something went wrong')
			->withErrors($validator)
			->withInput();
	}

	public function postCancel() {
		$booking = Booking::find(Input::get('id'));

		if ($booking) {
			$booking->status = 'Cancelled';
			$booking->save();
			return Redirect::to('bookings')
				->with('message', 'Your Booking Cancelled');
		}

		return Redirect::back()
			->with('message', 'Something went wrong, please try again');
	}

	public function getManage() {
		
		return View::make('bookings.manage')
			->with('bookings', Booking::orderBy('created_at', 'DESC')->paginate(10));
	}

	public function postManage() {
		$booking = Booking::find(Input::get('id'));

		if ($booking) {
			$booking->status = Input::get('status');
			$booking->save();
			return Redirect::to('bookings/manage')
				->with('message', 'Booking Updated');
		}

		return Redirect::back()
			->with('message', 'Something went wrong, please try again');
	}

}
