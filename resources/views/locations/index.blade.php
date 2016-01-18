@extends('layouts.master')

@section('content')


	<div class="panel panel-default">
			<div class="panel-heading">
				 Locations
			</div>

			<div class="panel-body">
				@if (count($locations) > 0)
						<table class="table table-striped location-table">

							<!-- Table Headings -->
							<thead>
									<th>Name</th>
									<th>Address (click address for map)</th>
									<th>Notes</th>
							</thead>

							<!-- Table Body -->
							<tbody>
								@foreach ($locations as $location)
									<tr>
										<td class="table-text">
											<div>{{ $location->name }}</div>
										</td>

										<td class="table-text">
											<div><a href="http://maps.google.com/#!q={{$location->address}}" target="_blank">{{ $location->address }}</a></div>
										</td>
										<td class="table-text">
											<div>{{ $location->notes }}</div>
										</td>

									</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<p>No locations are available.</p>
				 @endif
			 </div>
		</div>

@endsection