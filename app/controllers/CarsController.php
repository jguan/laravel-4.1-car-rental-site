<?php

class CarsController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin');
	}

	public function getIndex() {
		$types = array();

		foreach(CarType::all() as $type) {
			$types[$type->id] = $type->name;
		}

		$transmission = array(
            1 => 'Automatic',
            0 => 'Manual',
        );

		$aircon = array(
            1 => 'Yes',
            0 => 'No',
        );

		$seats = array(
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
            8 => 8,
            9 => 9,
        );

		$doors = array(
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
        );

		return View::make('cars.index')
			->with('cars', Car::with('carType')->get())
			->with('car_types', $types)
			->with('available_at', date("Y-m-d"))
			->with('transmission', $transmission)
			->with('aircon', $aircon)
			->with('seats', $seats)
			->with('doors', $doors);
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Car::$rules);

		if ($validator->passes()) {
			$car = new Car;
			$car->type_id = Input::get('type_id');
			$car->title = Input::get('title');
			if (Input::get('description')) $car->description = Input::get('description');
			$car->price = Input::get('price');
			$car->available_at = Input::get('available_at');
			$car->transmission = Input::get('transmission');
			$car->aircon = Input::get('aircon');
			$car->seats = Input::get('seats');
			$car->doors = Input::get('doors');

			$image = Input::file('image');
			$filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
			Image::make($image->getRealPath())->resize(220, 128)->save('public/img/cars/'.$filename);
			$car->image = 'img/cars/'.$filename;
			$car->save();

			return Redirect::to('admin/cars/index')
				->with('message', 'New Car Added');
		}

		return Redirect::to('admin/cars/index')
			->with('message', 'Something went wrong')
			->withErrors($validator)
			->withInput();
	}

	public function postDestroy() {
		$car = Car::find(Input::get('id'));

		if ($car) {
			File::delete('public/'.$car->image);
			$car->delete();
			return Redirect::to('admin/cars/index')
				->with('message', 'Car Record Deleted');
		}

		return Redirect::to('admin/cars/index')
			->with('message', 'Something went wrong, please try again');
	}

    public function getEdit($id) {
    	$types = array();

		foreach(CarType::all() as $type) {
			$types[$type->id] = $type->name;
		}

		$transmission = array(
            1 => 'Automatic',
            0 => 'Manual',
        );

		$aircon = array(
            1 => 'Yes',
            0 => 'No',
        );

		$seats = array(
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
            8 => 8,
            9 => 9,
        );

		$doors = array(
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
        );

        return View::make('cars.edit')
        	->with('car', Car::find($id))
        	->with('car_types', $types)
			->with('transmission', $transmission)
			->with('aircon', $aircon)
			->with('seats', $seats)
			->with('doors', $doors);
    }

	public function postUpdate() {
		$car = Car::find(Input::get('id'));

		if ($car) {
			$car->type_id = Input::get('type_id');
			$car->title = Input::get('title');
			$car->description = Input::get('description');
			$car->price = Input::get('price');
			$car->available_at = Input::get('available_at');
			$car->transmission = Input::get('transmission');
			$car->aircon = Input::get('aircon');
			$car->seats = Input::get('seats');
			$car->doors = Input::get('doors');
			$car->save();
			return Redirect::to('admin/cars/index')->with('message', 'Car Details Updated');
		}

		return Redirect::to('admin/cars/index')->with('message', 'Invalid Car ID');
	}
}
