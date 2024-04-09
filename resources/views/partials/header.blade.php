
<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>CareerVibe | Find Best Jobs</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" />
	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="#" />
</head>
<body data-instant-intensity="mousedown">
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
		<div class="container">
			<a class="navbar-brand" href="{{route('home')}}">CareerVibe</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
					</li>	
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{route('jobs')}}">Find Jobs</a>
					</li>										
				</ul>
				<a class="btn btn-primary me-2" href="{{route('post-job')}}" type="submit">Post a Job</a>

				@if(@Auth()->user())
					<form action="{{route('logout')}}" method="post">
						@csrf
						<input type="hidden" name="logout">
						<input type="submit" value="Logout" class="btn btn-outline-primary me-2">
					</form>
					<div class="action-dots float-end mx-20">
                        <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="me-2">{{@Auth::user()->name}}</i><i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{route('account')}}"> <i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="{{route('my-jobs')}}"> <i class="fa fa-eyes" aria-hidden="true"></i> My jobs</a></li>
                        </ul>
                    </div>
				@else				
				<a class="btn btn-outline-primary me-2" href="{{route('login')}}" type="submit">Login</a>
				@endif
			</div>
		</div>
	</nav>
</header>






