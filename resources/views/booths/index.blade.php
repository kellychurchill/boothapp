@extends('layouts.master')


@section('css')
<link rel="stylesheet" href="css/app.css">

@endsection
@section('content')


	<div class="panel panel-default">
			<div class="panel-heading">
				 Troop {{ Auth::user()->id }} Booths
			</div>

			<div class="panel-body">
				@if (count($booths) > 0)
					<form action="/booths" method="POST">
					{{ csrf_field() }}
						<h4>Click "Return" to release the booth to the list of <a href="/available">Available Booths</a>. Enter the total boxes sold at the booth and click "Update Totals" to save.</h4>
						<p>See the <a href="/locations">locations</a> page for address, map and location notes.</p>
						<table class="table table-striped booth-table">

							<!-- Table Headings -->
							<thead>
									<th></th>
									<th>Date</th>
									<th>Time</th>
									<th>Location</th>
									<th>Total Sold</th>
							</thead>

							<!-- Table Body -->
							<tbody>
								@foreach ($booths as $booth)
									<tr>
										<td>
											<a href="/booth/{{ $booth->id }}" class="btn btn-default" >Return</a>
										</td>

										<td class="table-text">
											<div>{{ $booth->day->date }}</div>
										</td>

										<td class="table-text">
											<div>{{ $booth->time_slot->slot }}</div>
										</td>
										<td class="table-text">
											<div>{{ $booth->location->name }}</div>
										</td>
										<td class="table-text">
											 <div class="form-group col-xs-3">
												{!! Form::text('totals[' . $booth->id . ']', $booth->total, array('class'=>'form-control')) !!}
										</div>

										</td>

									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="float: right"><button  type="submit"  class="btn btn-default" >Update Totals</button></div>
						{!! Form::close() !!}
					@else
						<p>No booths have been assigned.</p>
				 @endif
			 </div>
		</div>

@endsection