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
@endsection