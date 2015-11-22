@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
					<div class="panel-body">
						@if (!count($troop_numbers))

							All troops have registered.
						@else

							@if (count($errors) > 0)
									<div class="alert alert-danger">
											<strong>Whoops!</strong> There were some problems with your input.<br><br>
											<ul>
													@foreach ($errors->all() as $error)
															<li>{{ $error }}</li>
													@endforeach
											</ul>
									</div>
							@endif

						<form class="form-horizontal" role="form" method="POST" action="/auth/register">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class="col-md-4 control-label">Troop #</label>
								<div class="col-md-6">
									{!! Form::select('id', $troop_numbers, null, ['placeholder' => 'Select']) !!}
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Program Level</label>
								<div class="col-md-6">
									{!! Form::select('program_level', $program_levels, null, ['placeholder' => 'Select']) !!}
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name" value="{{ old('name') }}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">E-Mail Address</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email" value="{{ old('email') }}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Confirm Password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password_confirmation">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
											Register
									</button>
								</div>
							</div>
						</form>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
