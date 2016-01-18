<?php

namespace App\Http\Controllers;

use App\Booth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BoothRepository;

class BoothController extends Controller
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
	 * Display a list of all of the user's booths.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
	    return view('booths.index', [
	    	'booths' => $this->booths->forUser($request->user())
	    ]);
	}

	/**
	 * Update the booth
	 *
	 * @param  Request  $request
	 * @param  Booth  $booth
	 * @return Response
	 */
	public function store(Request $request, Booth $booth)
	{
  	 	$this->authorize('returnBooth', $booth);
		$booth->user_id = '';
		$booth->save();

  		return redirect('/booths');
	}

	/**
	 * Update the booth totals.
	 *
	 * @param  Request  $request
	 * @param  Booth  $booth
	 * @return Response
	 */
	public function updateBooths(Request $request)
	{
		foreach ($request->input('totals') as $id => $total) {
			$booth = Booth::find($id);
			$this->authorize('updateBooth', $booth);
			$booth->total = $total;
			$booth->save();

		}

  		return redirect('/booths');
	}

}
