<!DOCTYPE html>
<html>
<head>
	<title>My portfolio project</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<!--
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  -->
</head>
<body style="background-color: #f6f6f6">
<!-- our navbar-->
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'My Pprojct') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-link">
                            <a href="{{ url('/home') }}">Home</a>
                        </li>
                        @can('view', App\Project::class)
                        <li class="nav-link">
                            <a href="{{ url('/admin') }}">Admin</a>
                        </li>
                        @endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-link"><a href="#about">ABOUT</a></li>
                        <li class="nav-link"><a href="#letswork">Let's Work</a></li>
                        <li class="nav-link"><a href="#contact">CONTACT</a></li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

<!---content of  my portfolio page -->
<div class="container text-center" id="about">
	<h2>Hey I am NasirAhmad</h2>
	<p>a Web Developer</p>
</div>

<!-- some our projects -->

<div class="container text-center bg-grey" id="sampleproduct">
	<h2>These are some of my projects...</h2><br>
	
</div>

<div class="container text-center bg-grey" id="sampleproduct">
	<div class="row text-center">
	@foreach($projects as $project)
		<div class="col-md-4">
			<div class="img-thumbnail">
				<a href="{{$project->link}}" target="_blank">
					<img src="{{ asset($project->image) }}" alt="second" width="200" height="auto">
					<p class="lead">{{$project->name}}</p>
				</a>
			</div>
		</div>
	@endforeach
	</div>
</div>
<br>
<div class="container text-center ">
	<div class="row text-center">
		<div class="col-sm-12">
			<input type="submit" name="show" text="Show all" id="showbtn" >
		</div>
	</div>
</div>
<br>
<!--lets work together section-->
<div class="container-fluid text-center" id="letswork">
	<div class="col-sm-12">
		<h1>Let's work together...</h1>
		<p>How do your take your coffee?</p>
	</div>
	<div class="col-sm-12">
		<div class="row">
			<button id="btnfb"><a href="https://www.facebook.com" target="_blank"> Facebook</a></button>
			<button id="btnfb"><a href="https://www.gmail.com" target="_blank">Email</a></button>
			<button id="btnfb"><a href="https://www.slak.com" target="_blank"> Slavk</a></button>
			<button id="btnfb"><a href="https://www.yahoo.com" target="_blank"> Yahoo</a></button>
			<button id="btnfb"><a href="https://www.GitHub.com" target="_blank"> GitHub</a></button>
		</div>
	</div>
</div>


<footer class="container text-center " id="contact">
	<address >
  		<pre style="background-color: #483D8B; color: white;">
  		Centeral Locatio:Shahrak telaiy Kabul-Afghanistan
  		phon No: +93777337477
  		Email :naabpharma@gmail.com
  	    Facebook:Naabpharma
		</pre>
	</address>
</footer>
</body>
</html>