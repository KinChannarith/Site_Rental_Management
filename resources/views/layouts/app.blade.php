<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<!--mobile apps-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Rental Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--mobile apps-->
<!--Custom Theme files -->
<link  href="{{ asset('assets/css/bootstrap.css') }}" type="text/css" rel="stylesheet" media="all">
<link href="{{ asset('assets/css/style.css') }}" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" href="{{ asset('assets/css/prettySticky.css') }}" type="text/css">
<!-- //Custom Theme files -->
<!-- js -->

<!-- //js -->
<!-- start-smoth-scrolling-->

</head>
<body >
    
        <!--navigation-->
			<div class="top-nav">
				<navs>
					<div class="container">
					
						<div class="navbar-header logo">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
                        
                            
							<!-- <h1><a href="index.html">Rental</a></h1> -->
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="row">
                            
                        
                            <img src="{{ asset('assets/images/smart.jpg')}}" alt="" style="width:7%;heigh:7%;float:left;"/>
							@guest
                			@if (Route::has('login'))	
							<ul class="nav navbar-right">
                            	<li><a href="{{ route('login') }}" class="link-kumya active scroll"><span data-letters="Login">Login</span></a></li>
								
                            </ul>	
							@endif
							@if (Route::has('register'))
							<ul class="nav navbar-right">
                            	<li><a href="{{ route('register') }}" class="link-kumya active scroll"><span data-letters="Register">Register</span></a></li>
								
                            </ul>	
							@endif
                           @else

							<section data-navlink="Link2">
							
							</section>
                            <ul class="nav navbar-right" id="navbar">
                            	<li><a id="Link1" href="{{route('site-rental.Index')}}" class="link-kumya scroll"><span data-letters="Site Rental List">Site Rental List</span></a></li>
								<li><a id="Link2" href="{{route('monthly-payment.Index')}}" class="link-kumya scroll"><span data-letters="Monthly Payment List">Monthly Payment List</span></a></li>
								<li><a id="Link3" href="{{route('report.Index')}}" class="link-kumya scroll"><span data-letters="Report">Report</span></a></li>
								<li><a id="Link4" href="{{route('vendor-list.Index')}}" class="link-kumya scroll"><span data-letters="Vendor List">Vendor List</span></a></li>
								<li><a id="Link5" href="{{route('site-rental-payment-report.Index')}}" class="link-kumya"><span data-letters="SRPR">SRPR</span></a></li>	
								<li><a id="Link6" href="{{route('site-rental-payment.Index')}}" class="link-kumya"><span data-letters="SRP">SRP</span></a></li>
								
								<li><a href="{{ route('logout') }}" class="link-kumyaLogout">
										 <span data-letters="Logout">{{ Auth::user()->name }}</span>
									</a>
								</li>
							
                            </ul>	
                            @endguest
							<div class="clearfix"> </div>
                            
                        </div>
                      
							
						</div>
					</div>
				</nav>
			</div>	
		<!--//navigation-->
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
            @yield('content')
</body>
<script  src="{{ asset('assets/js/prettySticky.js') }}"></script>
<script  src="{{ asset('assets/js/bootstrap.js') }}" ></script>

</html>