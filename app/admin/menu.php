<?php

/*
 * Describe your menu here.
 *
 * There is some simple examples what you can use:
 *
 * 		Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard')->uses('\AdminController@getIndex');
 * 		Admin::menu(User::class)->icon('fa-user');
 * 		Admin::menu()->label('Menu with subitems')->icon('fa-book')->items(function ()
 * 		{
 * 			Admin::menu(\Foo\Bar::class)->icon('fa-sitemap');
 * 			Admin::menu('\Foo\Baz')->label('Overwrite model title');
 * 			Admin::menu()->url('my-page')->label('My custom page')->uses('\MyController@getMyPage');
 * 		});
 */

Admin::menu()->url('/')->label('Dashboard')->icon('fa-dashboard')->uses('\App\Http\Controllers\DashboardController@getIndex');
Admin::menu(\App\User::class)->icon('fa-user');
Admin::menu(\App\Location::class)->icon('fa-map-marker');
Admin::menu(\App\Day::class)->icon('fa-calendar');
Admin::menu(\App\TimeSlot::class)->icon('fa-clock-o');
Admin::menu(\App\Booth::class)->icon('fa-building');
