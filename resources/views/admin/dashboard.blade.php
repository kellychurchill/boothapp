@extends('admin::_layout.inner')

@section('innerContent')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				{{{ $title }}}
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<h3>Auto Assign Booths</h3>
			<p>Select a day to assign booths.</p>
			<form class="form-horizontal" role="form" method="POST" action="/admin/assign">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group has-feedback">
					<label class="col-md-4 control-label">Date</label>
					<div class="col-md-6">
						{!! Form::select('date',
							$dates,
							null,
							[
								'placeholder' => 'Select', 
								'class' => 'form-control', 
								'id' => 'date'
							]
						) !!}
					</div>
				</div>				
				<div class="form-group has-feedback">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
								Assign
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
	<script type="text/javascript">
		$('form').validate({ 
			rules: {
				date: {
					required: true
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
@stop