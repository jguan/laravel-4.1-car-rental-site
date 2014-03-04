<?php

class CarTypesController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin');
	}

	public function getIndex() {
		return View::make('car_types.index')
			->with('car_types', CarType::all());
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), CarType::$rules);

		if ($validator->passes()) {
			$type = new CarType;
			$type->name = Input::get('name');
			$type->save();

			return Redirect::to('admin/car_types/index')
				->with('message', 'New Car Type Created');
		}

		return Redirect::to('admin/car_types/index')
			->with('message', 'Something went wrong')
			->withErrors($validator)
			->withInput();
	}

	public function postDestroy() {
		$type = CarType::find(Input::get('id'));

		if ($type) {
			$type->delete();
			return Redirect::to('admin/car_types/index')
				->with('message', 'Car Type Deleted');
		}

		return Redirect::to('admin/car_types/index')
			->with('message', 'Something went wrong, please try again');
	}
}
