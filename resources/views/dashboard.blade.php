@extends('layouts.master')

@section('content')

<h1>Hello Troop {{ Auth::user()->id }} </h1>
{!! $content[0]->value !!}

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