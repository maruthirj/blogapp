<?php
class UserController extends BaseController {

	public function login()
	{
		// get POST data
		$userdata = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
		);

		if(Auth::attempt($userdata))
		{
			// we are now logged in, go to admin
			return Redirect::to('addContent');
		}
		else
		{
			$messages = new Illuminate\Support\MessageBag;
			$messages->add('Login Error', "Invalid email or password");
			return Redirect::to('login')->withErrors($messages)->withInput();;
		}
	}
	
	public function signup()
	{
		$rules = array(
						'name' => 'required',
						'password' => 'required',
						'confirmPassword' => 'required|same:password',
						'email' => 'required|email|unique:users'
				);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails())
		{
			return Redirect::to('signup')->withErrors($validator);
		}
		$user = new User();
		$user->name = Input::get("name");
		$user->email = Input::get("email");
		$password = Hash::make(Input::get("password"));
		$user->password = $password;
		$user->save();	
		return Redirect::to('login');
	}
}