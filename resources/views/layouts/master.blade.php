<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pudak Scientific</title>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/flatly/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
			padding-top: 70px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	    <div class="container">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="/">Pudak Scientific</a>
	        </div>

			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/pengantaran') }}">Supir</a></li>
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						@if(Auth::user()->position=="marketing")
						<li><a href="{{ url('/packaging') }}">Packaging</a></li>
						<li><a href="{{ url('/product') }}">Produk</a></li>
						<li><a href="{{ url('/box') }}">Kardus</a></li>
						<li><a href="{{ url('/order') }}">Pesanan</a></li>
						<li><a href="{{ url('/consumer') }}">Konsumer</a></li>
						<li><a href="{{ url('/user/'.Auth::user()->id.'/edit') }}">{{ Auth::user()->name }}</a></li>
						<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
						@else
						<li><a href="{{ url('/user') }}">Pegawai</a></li>
						<li><a href="{{ url('/supir') }}">Supir</a></li>
						<li><a href="{{ url('/user/'.Auth::user()->id.'/edit') }}">{{ Auth::user()->name }}</a></li>
						<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
						@endif
					@endif
				</ul>
			</div>

	    </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		@yield('content')
	</div>

	<hr/>

	

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="../asset/js/dom.js"></script>
	<script type="text/javascript" src="../asset/js/ajax.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>