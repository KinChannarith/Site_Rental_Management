<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<!--mobile apps-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Rental Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> -->
<!--mobile apps-->
<!--Custom Theme files -->
<link rel="stylesheet" href="{{ asset('assets/css/prettySticky.css') }}" type="text/css">

<link  href="{{ asset('assets/css/bootstrap.css') }}" type="text/css" rel="stylesheet" media="all">
<!-- <link href="{{ asset('assets/css/style.css') }}" type="text/css" rel="stylesheet" media="all"> -->
<!-- <script src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script>  -->
  <link  href="{{ asset('assets/css/bootstrap4.min.css') }}" type="text/css" rel="stylesheet" media="all">
<!-- //Custom Theme files -->
<!-- js -->

<!-- //js -->
<!-- start-smoth-scrolling-->

</head>
<body >
<nav class="navbar  navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('site-rental.Index')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('monthly-payment.Index')}}">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</nav>
@yield('content')
</body>
<script  src="{{ asset('assets/js/prettySticky.js') }}"></script> 
<!-- <script  src="{{ asset('assets/js/bootstrap.js') }}" ></script> -->
<script src="{{asset('js/app.js')}}"></script>
</html>