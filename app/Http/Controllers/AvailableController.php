<?php

namespace App\Http\Controllers;

use App\Booth;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BoothRepository;

class AvailableController extends Controller
{
    /**
     * The booth repository instance.
     *
     * @var BoothRepository
     */
    protected $booths;

    /**
     * Create a new controller instance.
     *
     * @param  BoothRepository  $booths
     * @return void
     */
    public function __construct(BoothRepository $booths)
    {
        $this->middleware('auth');

        $this->booths = $booths;
    }

	/**
	 * Display a list of all available booths.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
	    return view('available.index', [
	    	'booths' => $this->booths->avaialableBooths()
	    ]);
	}

	/**
	 * Take the booth.
	 *
	 * @param  Request  $request
	 * @param  Booth  $booth
	 * @return Response
	 */
	public function takeBooth(Request $request, Booth $booth)
	{

		$booth->user_id = $request->user()->id;
		$booth->save();

  		return redirect('/booths');
	}
}
