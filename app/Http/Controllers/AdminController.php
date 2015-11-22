<?php namespace App\Http\Controllers;

class AdminController extends Controller {

	public function __construct()
	{
	    $this->middleware('admin');
	}

	/**
	* Show the admin panel.
	*
	* @return Response
	*/
	public function admin()
	{	

		return view('admin.dashboard');
	}

	/**
	* Show the admin panel.
	*
	* @return Response
	*/
	public function configs()
	{	

		return view('admin.configs');
	}

	/*
	* Show the admin panel.
	*
	* @return Response
	*/
	public function days()
	{	

		return view('admin.days');
	}

	/**
	* Show the admin panel.
	*
	* @return Response
	*/
	public function locations()
	{	

		return view('admin.locations');
	}

	/*
	* Show the admin panel.
	*
	* @return Response
	*/
	public function troops()
	{	

		return view('admin.troops');
	}

}