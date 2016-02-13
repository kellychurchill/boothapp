@extends('layouts.master')

@section('content')
<h1>Hello Troop {{ Auth::user()->id }} </h1>

<p>Welcome to the OHSU Cookie Booth Website!</p>
<p>2016 Cookie sales begin January 20th and booth sales begin January 23rd. Booths will be distributed according to the following schedule (subject to change):</p>
<ul>
	<li>Monday 1/18: Week of Sat 1/23 - Fri 1/29</li>
	<li>Monday 1/25: Week of Sat 1/30 - Fri 2/5</li>
	<li>Monday 2/1: Week of Sat 2/6 - Fri 2/12</li>
	<li>Monday 2/8: Week of Sat 2/13 - Fri 2/19</li>
	<li>Monday 2/15: Remainder of the sale</li>
</ul>
<p>The final day of the cookie sale is Feburary 26, 2016. Additional booths may be scheduled for the weekend of February 27-28, if needed.</p>
<div class="panel panel-default">
	<div class="panel-body">
		@if (Auth::user()->status)
			<div class="alert alert-success">
				Your status is Actively Selling at booths.
			</div>
			<p>To stop receiving booths, click the button below to update your status.</p>
			<form method="POST" action="/dashboard">
				{{ csrf_field() }}
				<button>We do not want booths</button>
			</form>
		@else
			<div class="alert alert-danger">
				Your status is Not Selling at booths.
			</div>
			<p>To begin receiving booths, click the button below to update your status.</p>
			<form method="POST" action="/dashboard">
				{{ csrf_field() }}
				<button>We want booths</button>
			</form>
		@endif
	</div>
</div>
@endsection