@extends('layouts/app')
@section("content")
<!-- include "Models/Site.php"; -->
<?php
use App\Models\Helpers;

// if data 'search' posted in POST method, make it safe in HTML then store it in $search. If 'search' data was not posted, fill it with an empty string ('')
$search = (isset($_GET['search'])) ? htmlentities($_GET['search']) : '';
$filter = (isset($_GET['filter'])) ? htmlentities($_GET['filter']) : '';
$startDateFrom = (isset($_GET['startDateFrom'])) ? htmlentities($_GET['startDateFrom']) : '';
$endDateFrom = (isset($_GET['endDateFrom'])) ? htmlentities($_GET['endDateFrom']) : '';
$startDateTo = (isset($_GET['startDateTo'])) ? htmlentities($_GET['startDateTo']) : '';
$endDateTo = (isset($_GET['endDateTo'])) ? htmlentities($_GET['endDateTo']) : '';
$status = (isset($_GET['status'])) ? htmlentities($_GET['status']) : '';
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> -->
  <!-- <link rel="stylesheet" href="{{asset('assets/DataTables/datatables.css') }}"> -->
  <!-- <link rel="stylesheet" href="assets/dataTables/datatables.min.css"> -->
  <!-- <script src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script>  -->
  <!-- <script type="text/javascript">
      $('Link1').click(function(){
        alert("kok");
      });
  </script> -->
  <title>Site-Rental-List</title>

  <!-- Template CSS -->
  

  <!-- google fonts -->
  
</head>
<div class="container-fluid content-top-gap">

<!-- main content start -->
  <div >
      <!-- content -->
      <div>
          <div class="cards__heading">
              <h3><b>Site Rental List</b><span></span></h3>
              
              <br/>
              @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                            <p>{{ $message }}</p>
                            </div>
              @endif
              <div>
                
               
            </div>
                  
              
        </div>
      </div>
  </div>
  <div id="app">
  <siteList></sitelist>
  </div>



</div>
  <!-- <script type="text/javascript" src="assets/dataTables/datatables.min.js">
    $(document).ready( function () {
    $('#dataTables').DataTable();
    } );
  </script> -->
  <script src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script> 
<script type="text/javascript">
			$(function(){

				$('.active').removeClass('active');
				$('#Link1').addClass('active');

			});
			
	</script>


@endsection