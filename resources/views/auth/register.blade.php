@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
					<div class="panel-body">
		
							<p>Complete the form below to register for {{ date('Y') }}  Cookie Sale booth distribution and click "Register". You must register even if you were registered for last year's sale.</p>
							<p>Only enter one cookie coordinator's information. If you have more than one for your troop, enter the coordinator in charge of booths.</p>
							<!-- <p>If your troop number is not listed, your troop either already registered or needs to be added to the database.</p> -->
							<p>Questions or problems, contact Patty Crowe, OHSU Booth Coordinator, by <a href="mailto:ohsucookiebooths@gmail.com">email</a>.</p>	
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
						<div class="form-group has-feedback">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-6">All fields are required</div>
						</div>
							<div class="form-group has-feedback">
								<label class="col-md-4 control-label">Troop #</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="id" name="id" value="{{ old('id') }}">

								</div>
							</div>

							<div class="form-group has-feedback">
								<label class="col-md-4 control-label">Program Level</label>
								<div class="col-md-6">
									{!! Form::select('program_level',
										$program_levels,
										null,
										[
											'placeholder' => 'Select', 
											'class' => 'form-control', 
											'id' => 'program_level'
										]
									) !!}
								</div>
							</div>

							<div class="form-group has-feedback">
								<label class="col-md-4 control-label">Number of Girls Selling</label>
								<div class="col-md-6">
									{!! Form::select('num_girls', 
										range(1, 20), 
										null, 
										[
											'placeholder' => 'Select', 
											'class' => 'form-control', 
											'id' => 'num_girls'
										]
									) !!}
								</div>
							</div>

							<div class="form-group has-feedback">
								<label class="col-md-4 control-label">Do you want weekend booths (Sat/Sun) only?</label>
								<div class="col-md-6">
									{!! Form::select('weekend', 
										array(1 => 'Yes', 0 => 'No'),
										null, 
										[
											'placeholder' => 'Select', 
											'class' => 'form-control', 
											'id' => 'weekend'
										]
									) !!}
								</div>
							</div>

							<div class="form-group has-feedback required">
								<label for="name" class="col-md-4 control-label">Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
							</div>
							</div>

							<div class="form-group has-feedback">
								<label for="email" class="col-md-4 control-label">E-Mail Address</label>
								<div class="col-md-6">
									<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
								</div>
							</div>

							<div class="form-group has-feedback">
								<label class="col-md-4 control-label">Phone</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
								</div>
							</div>

							<div class="form-group has-feedback">
								<label class="col-md-4 control-label">Password</label>
								<div class="col-md-6">
									<input type="password" id="password" class="form-control" name="password">
								</div>
							</div>

							<div class="form-group has-feedback">
								<label class="col-md-4 control-label">Confirm Password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password_confirmation">
								</div>
							</div>

							<div class="form-group has-feedback">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
											Register
									</button>
								</div>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
	<script type="text/javascript">
		$('form').validate({ 
			rules: {
				id: {
					required: true
				},
				program_level: {
					required: true
				},
				num_girls: {
					required: true
				},
				weekend: {
					required: true
				},
				name: {
					required: true
				},
				email: {
					required: true
				},
				phone: {
					required: true
				},
				password: {
					required: true,
					minlength: 6
				},
				password_confirmation: {
					required: true,
          minlength: 6,
          equalTo: "#password"
				}
			},
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			unhighlight: function(element) {
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			},
			errorElement: 'span',
				errorClass: 'help-block',
				errorPlacement: function(error, element) {
					if(element.length) {
						error.insertAfter(element);
					} else {
						error.insertAfter(element);
					}
				} 
		 });
		</script>
@endsection