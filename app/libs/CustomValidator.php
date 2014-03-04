<?php

class CustomValidator extends Illuminate\Validation\Validator {

	/**
	 * Check to see if start date comes after today
	 * 
	 * @param  $attribute
	 * @param  $value
	 * @param  $parameters 
	 * @return boolean
	 */
	public function validateStartTime($attribute, $value, $parameters)
	{
		return (strtotime($value) >= strtotime(date('Y-m-d')));
	}

	/**
	 * Check to see if end date comes after start date
	 * 
	 * @param  $attribute
	 * @param  $value
	 * @param  $parameters 
	 * @return boolean
	 */
	public function validateEndTime($attribute, $value, $parameters)
	{
		$start_date = $this->getValue($parameters[0]); // get the value of the parameter (start_date)
		return (strtotime($value) >= strtotime($start_date));
	}

}