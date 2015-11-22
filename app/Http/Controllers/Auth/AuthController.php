<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{

		protected $redirectPath = '/dashboard';
		
		/*
		|--------------------------------------------------------------------------
		| Registration & Login Controller
		|--------------------------------------------------------------------------
		|
		| This controller handles the registration of new users, as well as the
		| authentication of existing users. By default, this controller uses
		| a simple trait to add these behaviors. Why don't you explore it?
		|
		*/

		use AuthenticatesAndRegistersUsers, ThrottlesLogins;

		/**
		 * Create a new authentication controller instance.
		 *
		 * @return void
		 */
		public function __construct()
		{
			$this->middleware('guest', ['except' => 'getLogout']);
		}

		/**
		 * Show the application registration form.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function getRegister()
		{
			$users = User::all();

			$troop_numbers = $users
				->filter(function($user) {
					return empty($user->email);
				})
				->lists('id', 'id')
				->sort();

			$program_levels = User::ProgramLevels();
			$data = [
				'troop_numbers'  => $troop_numbers,
				'program_levels' => $program_levels
			];
			return view('auth.register')
				->with($data);
		}

		/**
		 * Get a validator for an incoming registration request.
		 *
		 * @param  array  $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function validator(array $data)
		{
			return Validator::make($data, [
				'id' => 'required',
				'program_level' => 'required',
				'name' => 'required|max:255',
				'email' => 'required|email|max:255|unique:users',
				'password' => 'required|confirmed|min:6',
			], ['id.required' => 'Troop number is required']);
		}

		/**
		 * Create a new user instance after a valid registration.
		 *
		 * @param  array  $data
		 * @return User
		 */
		protected function create(array $data)
		{
			$user = User::find($data['id']);
			$user->name = $data['name'];
			$user->email = $data['email'];
			$user->password = bcrypt($data['password']);
			$user->program_level = $data['program_level'];
			$user->save();

			return $user;
		}
}
