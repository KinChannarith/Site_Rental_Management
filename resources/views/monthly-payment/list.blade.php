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
  <link rel="stylesheet" href="assets/dataTables/datatables.min.css">
  
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
        $("#datetimepicker3").change(function(){
            var payMonth = new Date($("#datetimepicker3").val());
            var year= payMonth.getFullYear();
            var month = (payMonth.getMonth() < 9 ? '0' : '') + (payMonth.getMonth()+1);
            
            $("#datetimepicker3").val(year+"-"+month+"-01");

        });
});
</script>
  
</head>
<div class="container content-top-gap">
<body class="sidebar-menu-collapsed">
<div class="se-pre-con"></div>
<section data-navlink="Link2">
<section class="forms">
<!-- main content start -->
  <div class="main-content">
      <!-- content -->
      <div class="py-2 mb-4">
          <div class="cards__heading">
              <h3>Monthly Payment List<span></span></h3>
            </div>  
              <br/>
              @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                            <p>{{ $message }}</p>
                            </div>
              @endif
              <div>
                
                <form action="{{route('monthly-payment.Index')}}" method="GET">
                <div class="row">
                        <section class="col-md-2">
                            <div class="form-group">
                               <label for="datetimepicker" class="input__label">Pay Date from</label>
                                <div class='input-group date' >
                                    <input type='date' id='datetimepicker' class="form-control input-style"
                                    name="startDateFrom"  
                                    value="<?= $startDateFrom ?>" /> 
                                   
                                </div>
                                <span style="color:red">@error('startDate'){{$message}}@enderror</span>
                            </div>

                        </section>
                        <section class="col-md-2">
                            <div class="form-group">
                               <label for="datetimepicker2" class="input__label">To</label>
                                <div class='input-group date' >
                                    <input type='date' id='datetimepicker2' class="form-control input-style"
                                    name="startDateTo" min="2021-01-01" max="2050-01-01" 
                                    value="<?= $startDateTo ?>" /> 
                                    
                                </div>
                                <span style="color:red">@error('endDate'){{$message}}@enderror</span>
                            </div>

                        </section>
                        <section>
                            <div class="form-group col-md-2">
                               <label for="datetimepicker3" class="input__label">Pay Month/Year</label>
                                <div class='input-group date'>
                                    <input type='date' class="form-control input-style"
                                    name="payMonth"  id="datetimepicker3"
                                    value="<?= $payMonth ?>" /> 
                                   
                                </div>
                                <span style="color:red">@error('endDate'){{$message}}@enderror</span>
                            </div>

                        </section>
                        <div class="form-group col-md-5">
                                <label for="inputStatus" class="input__label">Status</label>
                                <select id="inputStatus" class="form-control input-style"
                                    name="status"
                                   >
                                   <option value="" ></option>
                                   <option value="On Air" {{ $status =="On Air"? "selected" :""  }} >On Air</option>
                                    <option value="shut down" {{ $status=="shut down"? "selected" :""  }}>shut down</option>
                                    <option value="Status" {{ $status=="Status"? "selected" :""  }}>Status</option>
                                    <option value="Under Installation" {{$status=="Under Installation"? "selected" :""  }}>Under Installation</option> 
                                </select>
                                <span style="color:red">@error('status'){{$message}}@enderror</span>
                        </div>
                      </div>
                <div class="row">
                      
                      <div class="form-group col-md-2">
                                <select id="inputFilter" class="form-control input-style" 
                                name="filter"
                                value="<?= $filter ?>">
                                    <option  value="NewID" {{ $filter =="NewID"? "selected" :""  }}>New ID</option>
                                    <option value="fullname" {{ $filter =="fullname"? "selected" :""  }}>Owner Name</option>
                                    
                                </select>
                                
                      </div>
                      
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control input-style" id="inputSearch"
                                name="search"
                                value="<?= $search ?>"
                                placeholder="search">                              
                        </div>
                        
                      <div class="col-md-2">
                          <button type="submit" id="btnSearch" class="btn btn-primary btn-style btn-border">Search</button>
                      </div>
                </div>
                </div>
              </form>
              <a class='btn btn-success icons' href="create" type='submit' value='submit'>add</a>
              <div class="table-responsive">
                  <table class="table table-hover table-strip" id="dataTables">
                      <thead>
                      </thread>                      
                      <div class="row">          
                      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th width="17%">Actions</th>
                            <th width="10%">New ID</th>
                            <th width="10%">Old ID</th>
                            <th width="15%">Address</th>
                            <th width="10%">Status</th>
                            <th width="10%">Pay Month</th>
                            <th width="10%">Pay Date</th>
                            <th width="8%">Net Fee</th>
                            <th width="10%">Remark</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($monthlyPayments as $monthlyPayment)
                         
                          <tr>
                          <td><a class='btn btn-primary icons' href="view\{{$monthlyPayment->id}}" type='submit' value='submit' >visibility</a>
                          <a class='btn btn-success icons' href="edit\{{$monthlyPayment->id}}" type='submit' value='submit'>edit</a>
                          @csrf
                          @method('DELETE')
                          <a class='btn btn-danger icons' onclick="return confirm('Are you sure to delete the item?')" href="delete\{{$monthlyPayment->id}}" type='submit' value='submit'>delete</a>
                          </td>
                           <td>{{$monthlyPayment->newID}}</td>
                           <td>{{$monthlyPayment->oldID}}</td>
                           <td>{{$monthlyPayment->stringCut($monthlyPayment->address,20)}}</td>
                           <td>{{$monthlyPayment->status}}</td>
                           <td>{{$monthlyPayment->dateFormat($monthlyPayment->paymonth,'m-Y')}}</td>
                           <td>{{$monthlyPayment->dateFormat($monthlyPayment->paydate,'d-m-Y')}}</td>
                           
                           <td>{{$monthlyPayment->netFee}}</td>
                           <td>{{$monthlyPayment->stringCut($monthlyPayment->remark,10)}}</td>
                           
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                    <div class="container">
                      <div class="row">
                            <div class="col-10">
                              <p>Total records: {{ $monthlyPayments->total()}}</p>
                            </div>
                        
                            <div class="col-2">
                                {!!$monthlyPayments->appends(request()->input())->links(('pagination::bootstrap-4'))!!}
                            </div>
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