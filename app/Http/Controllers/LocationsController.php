<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BoothRepository;

class LocationsController extends Controller
{
	/**
	 * Display a list of all locations.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		$showLocations = DB::select('select * from configs where id = ?', [2]);


		if ($showLocations[0]->value === '1') {
		    return view('locations.index', [
		    	'locations' => Location::where('status', 1)->orderBy('name')->get()
		    ]);
		} else {
		    return view('locations.index', [
		    	'locations' => []
		    ]);	
		}
	}
}
