<?php namespace App\Http\Controllers;

use SleepingOwl\Admin\Admin;
use AdminAuth;
use View;
use App\Day;
use App\Booth;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
 

class AdminController extends \SleepingOwl\Admin\Controllers\AdminController {

	public function getIndex()
	{	
		$data = [
			'adminTitle' => 'OHSU Cookies Admin Panel',
			'user' => AdminAuth::user(),
			'menu' => $this->admin->menu->getItems(),
			'pageTitle' => 'Page Title',
			'title' => 'Dashboard',
			'dates' => Day::getList()
		];
		$view = View::make('admin.dashboard', $data);
		return $view;

	}

	public function postAutoAssign(Request $request) {

		// Weekend booths only = 1
		// if this is a weekend booth, can assign to everyone
		// if this is a weekday booth, can only assign to troops with 0
		$isWeekend = Day::find($request->date)->weekend;
		$brownies = User::getTroops('Brownie', $isWeekend)->toArray();
		$juniors = User::getTroops('Junior', $isWeekend)->toArray();
		$cadettes = User::getTroops('Cadette', $isWeekend)->toArray();
		$seniors = User::getTroops('Senior', $isWeekend)->toArray();
		$ambassadors = User::getTroops('Ambassador', $isWeekend)->toArray();
		$all = array_merge($brownies, $juniors, $cadettes, $seniors, $ambassadors);
		$nonCsa = array_merge($brownies, $juniors);
		$csa = array_merge($cadettes, $seniors, $ambassadors);

		if ($isWeekend) {
			$booths = Booth::getBooths($request->date, '', $isWeekend);
			if ($booths->count()) {
				shuffle($all);
				foreach ($booths as $key => $booth) {
					$booth = Booth::find($booth['id']);
					$id = array_rand($all);
					$troop = $all[$id];
					$booth->user_id = $troop['id'];
					$booth->save();
				}
			}
		} else {
			$earlyBooths = Booth::getBooths($request->date, true, $isWeekend);
			$lateBooths = Booth::getBooths($request->date, false, $isWeekend);

			if ($earlyBooths->count()) {
				shuffle($nonCsa);
				foreach ($earlyBooths as $key => $booth) {
					$booth = Booth::find($booth['id']);
					$id = array_rand($nonCsa);
					$troop = $nonCsa[$id];
					$booth->user_id = $troop['id'];
					$booth->save();
				}

			}

			if ($lateBooths->count()) {
				shuffle($csa);
				foreach ($lateBooths as $key => $booth) {
					$booth = Booth::find($booth['id']);
					$id = array_rand($csa);
					$troop = $csa[$id];
					$booth->user_id = $troop['id'];
					$booth->save();
				}
			}
		}

  		return redirect('/admin/booths');
	}
}