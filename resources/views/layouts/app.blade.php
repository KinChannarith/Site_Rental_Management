<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/style-starter.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/style-table.css') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="sidebar-menu-collapsed">
    <div id="app">
       
        <!-- sidebar menu start -->
    <div class="sidebar-menu sticky-sidebar-menu">

<!-- logo start -->
<div class="logo">
<h1><a href="index.html">Site Rental</a></h1>
</div>

<!-- if logo is image enable this -->
<!-- image logo --
<div class="logo">
<a href="index.html">
    <img src="image-path" alt="Your logo" title="Your logo" class="img-fluid" style="height:35px;" />
</a>
</div>
<!-- //image logo -->

<div class="logo-icon text-center">
<a href="index.html" title="logo"><img src="{{ asset('assets/images/logo.png') }}" alt="logo-icon"> </a>
</div>

<!-- //logo end -->

<div class="sidebar-menu-inner">

    <!-- sidebar nav start -->
    <ul class="nav nav-pills nav-stacked custom-nav">
        <li class="active"><a href="index.html"><i class="fa fa-tachometer"></i><span> Dashboard</span></a>
        </li>
        <li class="menu-list">
        <a href="#"><i class="fa fa-map-marker"></i>
            <span>Site Rental<i class="lnr lnr-chevron-right"></i></span></a>
        <ul class="sub-menu-list">
            <li><a href="{{ route('site-rental.Create') }}"><i class="fa fa-plus"></i>Create</a> </li>
            
            <!-- <li><a href="{{ route('site-rental.Index') }}"><i class="fa fa-list"></i>List</a> </li> -->
            <li><a href="{{ route('site-rental.Index') }}"><i class="fa fa-list"></i>List</a> </li>
        </ul>
        </li>
        <li class="menu-list">
        <a href="#"><i class="fa fa-credit-card"></i>
            <span>Monthly Payment<i class="lnr lnr-chevron-right"></i></span></a>
        <ul class="sub-menu-list">
            <li><a href="{{ route('monthly-payment.Create') }}"><i class="fa fa-plus"></i>Create</a> </li>
            <li><a href="cards.html"><i class="fa fa-list"></i>List</a> </li>
        </ul>
        </li>
        <li><a href="forms.html"><i class="fa fa-file-text"></i> <span>Report</span></a></li>
    </ul>
    <!-- //sidebar nav end -->
    <!-- toggle button start -->
    <a class="toggle-btn">
        <i class="fa fa-angle-double-left menu-collapsed__left"><span>Hide Menu</span></i>
        <i class="fa fa-angle-double-right menu-collapsed__right"></i>
    </a>
    <!-- //toggle button end -->
    </div>
    
    </div>
    <!-- //sidebar menu end -->
    <!-- header-starts -->
    
    <div class="header sticky-header">

    <!-- notification menu start -->
    <div class="menu-right">
    <div class="container">
    <div class="row">
        <div class="col-8 mt-3">
            <h4 class="ml-4">Site Rental Management</h4>
        </div>
        <div class="col-4">
        <div class="navbar user-panel-top">
    
            @guest
                @if (Route::has('login'))
                    
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    
                @endif

                @if (Route::has('register'))
                    
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                   
                @endif
            @else
                <!-- <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li> -->
                <p>{{ Auth::user()->name }}</p>
                <div class="profile_details">
                <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="profile_img">
                        <img src="{{asset('assets/images/profile.png')}}" class="rounded-circle" alt="" />
                        <!-- <div class="user-active">
                        <span></span>
                        </div> -->
                    </div>
                    </a>
                    <ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">
                    <li class="user-info">
                        <h5 class="user-name">{{ Auth::user()->name }}</h5>
                        <!-- <span class="status ml-2">Available</span> -->
                    </li>

                    <!-- <li> <a href="#"><i class="lnr lnr-user"></i>My Profile</a> </li>
                    <li> <a href="#"><i class="lnr lnr-users"></i>1k Followers</a> </li>
                    <li> <a href="#"><i class="lnr lnr-cog"></i>Setting</a> </li>
                    <li> <a href="#"><i class="lnr lnr-heart"></i>100 Likes</a> </li> -->

                    <li >
                        
                        <a class="fa fa-power-off pl-2" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                            @csrf
                        </form> 
                        <!-- <a href="#sign-up.html"><i class="fa fa-power-off"></i> Logout</a> -->
                        
                        
                        
                    </li>




                    </ul>
                </li>
                </ul>
            </div>
            @endguest

        </div>

        </div>
    </div>
    </div>
    
    </div>
    </div>
    <!--notification menu end -->
    </div>

    <!-- //header-ends -->
        <!-- <main class="py-4"> -->
            @yield('content')
        <!-- </main> -->
    </div>
</body>
<script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("movetop").style.display = "block";
    } else {
      document.getElementById("movetop").style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>
<!-- /move top -->


<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-1.10.2.min.js')}}"></script>

<!-- chart js -->
<script src="{{asset('assets/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/js/utils.js')}}"></script>
<!-- //chart js -->

<!-- Different scripts of charts.  Ex.Barchart, Linechart -->
<script src="{{asset('assets/js/bar.js')}}"></script>
<script src="{{asset('assets/js/linechart.js')}}"></script>
<!-- //Different scripts of charts.  Ex.Barchart, Linechart -->


<script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>

<!-- close script -->
<script>
  var closebtns = document.getElementsByClassName("close-grid");
  var i;

  for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function () {
      this.parentElement.style.display = 'none';
    });
  }
</script>
<!-- //close script -->

<!-- disable body scroll when navbar is in active -->
<script>
  $(function () {
    $('.sidebar-menu-collapsed').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll when navbar is in active -->

 <!-- loading-gif Js -->
 <script src="{{asset('assets/js/modernizr.js')}}"></script>
 <script>
     $(window).load(function () {
         // Animate loader off screen
         $(".se-pre-con").fadeOut("slow");;
     });
 </script>
 <!--// loading-gif Js -->

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

</html>
