<?php namespace App\Http\Controllers;

use SleepingOwl\Admin\Admin;

use View;

class DashboardController extends Controller
{
	public function getIndex()
	{
		$content = '
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Admin Dashboard </h1>
				
			</div>
		</div>
		';
		return Admin::view($content, 'Dashboard');
	}
} 