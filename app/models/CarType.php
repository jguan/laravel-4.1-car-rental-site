<?php

class CarType extends Eloquent {

	protected $fillable = array('name');

	public static $rules = array('name'=>'required|min:3');

	public function cars() {
		return $this->hasMany('Car');
	}
}
