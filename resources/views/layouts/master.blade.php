<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
@yield('title')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

@yield('css')

</head>
<body> 
<div class="container">
	<nav class="navbar navbar-inverse ">
	 <div class="container-fluid">

		 <!-- Brand and toggle get grouped for better mobile display -->
		 <div class="navbar-header">
			 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

				 <span class="sr-only">Toggle navigation</span>
				 <span class="icon-bar"></span>
				 <span class="icon-bar"></span>
				 <span class="icon-bar"></span>
			 </button>
			 <a class="navbar-brand" href="/">OHSU Cookie Booths</a>
		 </div>

		 <!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				@if (Auth::check()) 
					<ul class="nav navbar-nav">
						<li @if (Request::is('dashboard')) class="active" @endif><a href="/dashboard">Dashboard</a></li>
 						<li @if (Request::is('booths')) class="active" @endif><a href="/booths">Your Booths</a></li>
						<li @if (Request::is('available')) class="active" @endif><a href="/available">Available Booths</a></li>
						<li @if (Request::is('locations')) class="active" @endif><a href="/locations">Booth Locations</a></li> 
						<li @if (Request::is('reports')) class="active" @endif><a href="/reports">Booth Reports</a></li> 
					</ul>
				@endif
							<ul class="nav navbar-nav navbar-right">
				 @if (!Auth::check())
					 <li><a href="/auth/login">Login </a></li>
					 <li><a href="/auth/register">Register</a></li>
				 @else (Auth::check())
					 <li class="dropdown">
						 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
						 <ul class="dropdown-menu" role="menu">
							<li><a href="/auth/logout">Logout</a></li>
						 </ul>
					 </li>
				 @endif
				</ul>
		 </div><!-- /.navbar-collapse -->
	 </div><!-- /.container-fluid -->
	</nav>

	@include('alerts.alert')
	<div class="col-md-9">

	@yield('content')

	</div>
</div>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$('#sidebar').affix({
			offset: {
				top: $('header').height()
			}
		});
	</script>
	@yield('scripts')
</body>
</html>