@extends('layouts/app')
@section("content")
<!-- include "Models/Site.php"; -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php

// if data 'search' posted in POST method, make it safe in HTML then store it in $search. If 'search' data was not posted, fill it with an empty string ('')
$search = (isset($_GET['search'])) ? htmlentities($_GET['search']) : '';
$filter = (isset($_GET['filter'])) ? htmlentities($_GET['filter']) : '';
$startDateFrom = (isset($_GET['startDateFrom'])) ? htmlentities($_GET['startDateFrom']) : '';
$payMonth = (isset($_GET['payMonth'])) ? htmlentities($_GET['payMonth']) : '';
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
  
  <title>Monthly-Payment-List</title>

  <!-- Template CSS -->
  <script src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script> 
<script type="text/javascript">
			$(function(){

				$('.active').removeClass('active');
				$('#Link2').addClass('active');

			});
			
	</script> 

  <!-- google fonts -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
  //  $(document).ready(function(){
  //       $("#datetimepicker3").change(function(){
  //           // $year= $("#datetimepicker").Year();
  //           // $month=$("#datetimepicker").Month();
  //           // $("#datetimepicker").val($year+"-"+$month+"+"-01");
  //           var dt = new Date($("#datetimepicker").val());
  //           var year= dt.getFullYear();
  //           var month = (dt.getMonth() < 10 ? '0' : '') + (dt.getMonth()+1);

  //           alert(year+"-"+month+"-01");
  //           //$("#datetimepicker3").val(year+"-"+month+"-01");
  //       });
        
  //       //alert('Kok');
  //   });
  $(document).ready(function(){
        // $("#btnSearch").click(function(){
        //   var StartDateFrom = new Date( $("#datetimepicker").val());
        //    var StartDateTo = new Date($("#datetimepicker2").val());
        //    var EndDateTo = new Date($("#datetimepicker3").val());

        //    StartDateFrom =

        //    var Status = $("#inputStatus").val()
        //    var Filter = $("#inputFilter").val()
        //    var Search = $("#inputSearch").val()
        //    var datas = {startDateFrom:StartDateFrom,
        //                 startDateTo:StartDateTo,
        //                 status:Status,
        //                 filter:Filter,
        //                 search:Search,
        //                 payMonth: EndDateTo };
          
        //   var datatype = 'jsonp';
        //   // $.get("{{ URL::to('monthly-payment/index')}}",datas,function(data){
          
        //   // });
         
          
        // });
        
        // $("#datetimepicker3").change(function(){
        //     var payMonth = new Date($("#datetimepicker3").val());
        //     var year= payMonth.getFullYear();
        //     var month = (payMonth.getMonth() < 9 ? '0' : '') + (payMonth.getMonth()+1);
            
        //     $("#datetimepicker3").val(year+"-"+month+"-01");

        // });
        // $("#datetimepickerPayMonth").change(function(){
        //     var payMonth = new Date($("#datetimepickerPayMonth").val());
        //     var year= payMonth.getFullYear();
        //     var month = (payMonth.getMonth() < 9 ? '0' : '') + (payMonth.getMonth()+1);
            
        //     $("#datetimepickerPayMonth").val(year+"-"+month+"-01");

        // });
});
</script>
  
</head>
<div class="container-fluid content-top-gap">
<body >
  <div id="app">
  <monthlypayments></monthlypayments>
  </div>
<!--footer section start-->

<!--footer section end-->
<!-- move top -->
<!-- <button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button> -->
<!-- 
<script src="assets/dataTables/datatables.min.js"></script> -->
</body>
<!-- <script src="{{asset('assets/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable.js')}}"></script> -->
</div>



</html>


@endsection