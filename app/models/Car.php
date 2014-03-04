<?php

class Car extends Eloquent {

	protected $fillable = array(
        'type_id',
        'title',
        'description',
        'price',
        'available_at',
        'transmission',
        'aircon',
        'seats',
        'doors',
        'image'
    );

	public static $rules = array(
		'type_id'=>'required|integer',
		'title'=>'required|min:2',
		'price'=>'required|numeric',
		'available_at'=>'date',
		'transmission'=>'integer',
		'aircon'=>'integer',
		'seats'=>'required|integer|min:2|max:9',
		'doors'=>'required|integer|min:1|max:6',
		'image'=>'required|image|mimes:jpeg,jpg,bmp,png,gif'
	);

	public function carType() {
		return $this->belongsTo('CarType', 'type_id');
	}

	public function bookings() {
		return $this->hasMany('Booking');
	}

}
