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
$payMonth = (isset($_GET['payMonth'])) ? htmlentities($_GET['payMonth']) : '';
$startDateTo = (isset($_GET['startDateTo'])) ? htmlentities($_GET['startDateTo']) : '';
$endDateTo = (isset($_GET['endDateTo'])) ? htmlentities($_GET['endDateTo']) : '';
$status = (isset($_GET['status'])) ? htmlentities($_GET['status']) : '';
//
$fromYear = (isset($_GET['fromYear'])) ? htmlentities($_GET['fromYear']) : Helpers::dateFormat($now,'Y');
$toYear = (isset($_GET['toYear'])) ? htmlentities($_GET['toYear']) : Helpers::dateFormat($now,'Y');

?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> -->
  <!-- <link rel="stylesheet" href="{{asset('assets/DataTables/datatables.css') }}"> -->
  <!-- <link rel="stylesheet" href="assets/dataTables/datatables.min.css"> -->
  
  <title>report-site-rental-payment</title>

  <!-- Template CSS -->

  
</head>
<div class="container-fluid content-top-gap">
<body class="sidebar-menu-collapsed">
<div class="se-pre-con"></div>
<section data-navlink="Link2">
<section class="forms">
<!-- main content start -->
  <div class="main-content">
      <!-- content -->
      <div class="py-2 mb-4">
          <div class="cards__heading">
              <h3>Site Rental Payment Report<span></span></h3>
            </div>  
              <br/>
              @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                            <p>{{ $message }}</p>
                            </div>
              @endif
              <div>
                
                <!-- <form action="{{route('monthly-payment.Index')}}" method="GET"> -->
                  <form action="#"></form>
                <div class="row">
                     <div class="form-group col-md-2">
                        <label for="inputSearch" class="input__label">New ID</label> 
                            <input type="text" class="form-control input-style" id="inputSearch"
                                name="search"
                                value="<?= $search ?>"
                                placeholder="search">                              
                        </div>
                        
                        <section class="col-md-2">
                            <div class="form-group >
                                    <label for="inputYear" class="input__label"><br/></label>
                                    <select id="inputYear" class="form-control input-style"
                                        name="fromYear" >
                                        <option value="1" {{ $fromYear-1 ==$fromYear? "selected" :""  }} ><?php echo $fromYear-1 ?></option>
                                        <option value="2" {{ $fromYear==$fromYear? "selected" :""  }}><?php echo $fromYear ?></option>
                                        <option value="3" {{ $fromYear+1==$fromYear? "selected" :""  }}><?php echo $fromYear+1 ?></option>
                                      </select>
                                    <span style="color:red">@error('status'){{$message}}@enderror</span>
                            </div>
                        </section>

                        
                        
                        <section class="col-md-2">
                          <div class="form-group >
                                  <label for="inputYear" class="input__label"><br/></label>
                                  <select id="inputYear" class="form-control input-style"
                                      name="toYear" >
                                      <option value="1" {{ $toYear-1 ==$toYear? "selected" :""  }} ><?php echo $toYear-1 ?></option>
                                      <option value="2" {{ $toYear==$toYear? "selected" :""  }}><?php echo $toYear ?></option>
                                      <option value="3" {{ $toYear+1==$toYear? "selected" :""  }}><?php echo $toYear+1 ?></option>
                                    </select>
                                  <span style="color:red">@error('status'){{$message}}@enderror</span>
                          </div>
                        </section>

                        
                        <br/>
                        
                          <button type="submit" id="btnSearch" class="btn btn-primary btn-style btn-border" style="width:100px">Search</button>
                          <button type="submit" id="btnDanger" class="btn btn-danger btn-style btn-border" style="width:100px">Reset</button>
                      
                    </div>
                
                </div>
              </form>
              <div class="row">
                <div class="col-md-2">
                <a class='btn btn-primary icons' href="create" type='submit' value='submit'>add</a>
                </div>
                <div class="col-md-10"></div>
              </div>
              <div class="table-responsive">
                  <table class="table table-hover table-strip" id="dataTables">
                      <thead>
                      </thread>                      
                      <div class="row">          
                      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th width="17%" rowspan=2 style="vertical-align:middle;">Site ID</th>
                            <th width="10%" rowspan=2 style="vertical-align:middle;">Year</th>
                            <th width="10%" colspan=2>Janaury</th>
                            <th width="10%" colspan=2>February</th>
                            <th width="10%" colspan=2>March</th>
                            <th width="10%" colspan=2>April</th>
                            <th width="10%" colspan=2>May</th>
                            <th width="10%" colspan=2>June</th>
                            <th width="10%" colspan=2>July</th>
                            <th width="10%" colspan=2>August</th>
                            <th width="10%" colspan=2>September</th>
                            <th width="10%" colspan=2>October</th>
                            <th width="10%" colspan=2>November</th>
                            <th width="10%" colspan=2>December</th>
                          </tr>
                          <tr>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                    </table>
                    
              </div>
              <div class="container">
                      <div class="row">
                            <div class="col-10">
                              <p>Total records: {{ $reports->total()}}</p>
                            </div>
                        
                            <div class="col-2">
                                {!!$reports->appends(request()->input())->links(('pagination::bootstrap-4'))!!}
                            </div>
                      </div>
                    </div>
            </div>
                  
              
        </div>
      </div>
  </div>
</section>
<!-- main content end-->
</section>
  <script src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script> 
<script type="text/javascript">
			$(function(){

				$('.active').removeClass('active');
				$('#Link5').addClass('active');

			});
			
	</script> 

  <!-- google fonts -->
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
 <script>
  
  $(document).ready(function(){
        $("#datetimepicker3").change(function(){
            var payMonth = new Date($("#datetimepicker3").val());
            var year= payMonth.getFullYear();
            var month = (payMonth.getMonth() < 9 ? '0' : '') + (payMonth.getMonth()+1);
            
            $("#datetimepicker3").val(year+"-"+month+"-01");

        });
});
</script>
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
<script src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script> 
<script type="text/javascript">
			$(function(){

				$('.active').removeClass('active');
				$('#Link5').addClass('active');

			});
			
	</script> 

  <!-- google fonts -->
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
 <script>
  
  $(document).ready(function(){
        $("#datetimepicker3").change(function(){
            var payMonth = new Date($("#datetimepicker3").val());
            var year= payMonth.getFullYear();
            var month = (payMonth.getMonth() < 9 ? '0' : '') + (payMonth.getMonth()+1);
            
            $("#datetimepicker3").val(year+"-"+month+"-01");

        });
});
</script>


</html>


@endsection