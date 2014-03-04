<?php

class UsersTableSeeder extends Seeder {

	public function run() {
		$user = new User;
		$user->firstname = 'Admin';
		$user->lastname = 'Admin';
		$user->email = 'admin@carrental.com';
		$user->password = Hash::make('password');
		$user->telephone = '0299999999';
		$user->admin = 1;
		$user->save();
	}
}
