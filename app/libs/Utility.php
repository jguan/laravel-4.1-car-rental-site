<?php

class Utility {

	public static function display($availability) {
		if ($availability == 0) {
			echo "Not Available";
		} else if ($availability == 1) {
			echo "Available";
		}
	}

	public static function displayClass($value) {
		if ($value) {
			echo "green";
		} else {
			echo "red";
		}
	}
}
