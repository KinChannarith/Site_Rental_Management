@extends('layouts/app')
@section("content")

<!-- include "Models/Site.php"; -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php

use App\Models\Helpers;
use Carbon\Carbon;
$now = Carbon::now();
// if data 'search' posted in POST method, make it safe in HTML then store it in $search. If 'search' data was not posted, fill it with an empty string ('')
$search = (isset($_GET['search'])) ? htmlentities($_GET['search']) : '';
$filter = (isset($_GET['filter'])) ? htmlentities($_GET['filter']) : '';
$startDateFrom = (isset($_GET['startDateFrom'])) ? htmlentities($_GET['startDateFrom']) : '';
$endDateFrom = (isset($_GET['endDateFrom'])) ? htmlentities($_GET['endDateFrom']) : '';
$startDateTo = (isset($_GET['startDateTo'])) ? htmlentities($_GET['startDateTo']) : '';
$endDateTo = (isset($_GET['endDateTo'])) ? htmlentities($_GET['endDateTo']) : '';
$status = (isset($_GET['status'])) ? htmlentities($_GET['status']) : '';
$month = (isset($_GET['month'])) ? htmlentities($_GET['month']) : Helpers::dateFormat($now,'m');
$year = (isset($_GET['year'])) ? htmlentities($_GET['year']) : Helpers::dateFormat($now,'Y');

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
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <!-- <script src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script> 
  <link  href="{{ asset('assets/css/bootstrap4.min.css') }}" type="text/css" rel="stylesheet" media="all"> -->
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
<section data-navlink="Link1">

<section class="forms">
<!-- main content start -->
  <div class="main-content">
      <!-- content -->
      <div class=" py-2 mb-4">
            <div class="cards__heading">
              <h3><b>Site Rental Payment</b><span></span></h3>
              
             
              @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                            <p>{{ $message }}</p>
                            </div>
              @endif
              <div id="app">
              
              <srps></srps>
                
              
              </div>
            </div>
                  
              
        </div>
      </div>
  </div>
</section>

</section>

</div>


  @include('components.smartModal')
  @include('components.ecoModal')
  <!-- <script src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script>  -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<!-- <script  src="{{ asset('assets/js/bootstrap4.min.js') }}" ></script> -->
<script src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script> 
 
<script  src="{{ asset('assets/js/bootstrap4.min.js') }}" ></script>

<script type="text/javascript">
			$(function(){

				$('.active').removeClass('active');
				$('#Link6').addClass('active');

        $('#detail').click(function(){
          $url="/site-rental-payment/detail";
              window.open($url, '_blank',"toolbar=yes, scrollbars=yes, resizable=yes, top=500,left=500,width=1000, height=800");
        });
        $('#inputSiteOwner').change(function(){
          if($('#inputSiteOwner').val()=="SmartAxiata")
              {
                $('#HeaderChange').html("Total site under construction");
                $('#updatePayment').attr('data-target','#smartModalCenter');
              }
          else 
              //alert("e.co")
              {
                $('#HeaderChange').html("Total site under installation");
                $('#updatePayment').attr('data-target','#ecoModalCenter');
              }
        });
        $('#updatePayment').on('show.bs.modal', function (event) {
 
            var modal = $(this)

            });

			});
      $('#myModal').modal('show')
      
			
	</script>
   <script src="{{asset('js/app.js')}}"></script>

</html>


@endsection