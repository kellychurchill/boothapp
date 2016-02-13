<?php namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	/**
	 * Update status.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function updateStatus(Request $request)
	{
		$user = User::findOrFail($request->user()->id);
		$user->status = ($user->status) ? 0 : 1;
		$user->save();
 		return redirect('/dashboard');
	}
} 