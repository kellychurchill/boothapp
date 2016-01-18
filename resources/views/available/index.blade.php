@extends('layouts.master')

@section('content')


	<div class="panel panel-default">
			<div class="panel-heading">
				 Available Booths
			</div>

			<div class="panel-body">
				@if (count($booths) > 0)
						<table class="table table-striped booth-table">

							<!-- Table Headings -->
							<thead>
									<th>Date</th>
									<th>Time</th>
									<th>Location</th>
									<th></th>
							</thead>

							<!-- Table Body -->
							<tbody>
								@foreach ($booths as $booth)
									<tr>
										<td class="table-text">
											<div>{{ $booth->day->date }}</div>
										</td>

										<td class="table-text">
											<div>{{ $booth->time_slot->slot }}</div>
										</td>
										<td class="table-text">
											<div>{{ $booth->location->name }}</div>
										</td>
										<td>
											<form action="/available/{{ $booth->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('PUT') }}

												<button>Take</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<p>No booths are available.</p>
				 @endif
			 </div>
		</div>

@endsection