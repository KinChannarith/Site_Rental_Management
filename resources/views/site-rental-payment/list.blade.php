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
  <script src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script> 
  <link  href="{{ asset('assets/css/bootstrap4.min.css') }}" type="text/css" rel="stylesheet" media="all">
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
              
              <br/>
              @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                            <p>{{ $message }}</p>
                            </div>
              @endif
              <div>
                
                <form action="{{route('site-rental.Search')}}" method="GET">
                
                      <div class="row">
                         
                        <section class="col-md-3">
                          <div class="form-group >
                                  <label for="inputMonth" class="input__label">Select a month and a year</label>
                                  <select id="inputMonth" class="form-control input-style"
                                      name="month" >
                                      <option value="01" {{ $month =="01"? "selected" :""  }} >January</option>
                                      <option value="02" {{ $month=="02"? "selected" :""  }}>February</option>
                                      <option value="03" {{ $month=="03"? "selected" :""  }}>March</option>
                                      <option value="04" {{  $month=="04"? "selected" :""  }}>April</option> 
                                      <option value="05" {{ $month =="05"? "selected" :""  }} >May</option>
                                      <option value="06" {{ $month=="06"? "selected" :""  }}>June</option>
                                      <option value="07" {{ $month=="07"? "selected" :""  }}>July</option>
                                      <option value="08" {{ $month=="08"? "selected" :""  }}>August</option> 
                                      <option value="09" {{ $month =="09"? "selected" :""  }} >September</option>
                                      <option value="10" {{ $month=="10"? "selected" :""  }}>October</option>
                                      <option value="11" {{ $month=="11"? "selected" :""  }}>November</option>
                                      <option value="12" {{ $month=="12"? "selected" :""  }}>December</option> 
                                  </select>
                                  <span style="color:red">@error('status'){{$message}}@enderror</span>
                          </div>
                        </section>
                        <section class="col-md-2">
                          <div class="form-group >
                                  <label for="inputYear" class="input__label"><br/></label>
                                  <select id="inputYear" class="form-control input-style"
                                      name="year" >
                                      <option value="1" {{ $year-1 ==$year? "selected" :""  }} ><?php echo $year-1 ?></option>
                                      <option value="2" {{ $year==$year? "selected" :""  }}><?php echo $year ?></option>
                                      <option value="3" {{ $year+1==$year? "selected" :""  }}><?php echo $year+1 ?></option>
                                    </select>
                                  <span style="color:red">@error('status'){{$message}}@enderror</span>
                          </div>
                        </section>
                        <section class="col-md-2">
                          <div class="form-group >
                                  <label for="inputSiteOwner" class="input__label">Site Owner</label>
                                  <select id="inputSiteOwner" class="form-control input-style"
                                      name="siteOwner" >
                                      <option value="SmartAxiata" {{ $month =="SmartAxiata"? "selected" :""  }} >Smart Axiata</option>
                                      <option value="e.co" {{ $month=="e.co"? "selected" :""  }}>e.co</option>
                                    </select>
                                  <span style="color:red">@error('status'){{$message}}@enderror</span>
                          </div>
                        </section>
                        <section class="col-md-2">
                          <div class="form-group">
                            <br/>
                            <button type="submit" class="btn btn-danger btn-style btn-border" style="width:100px">Reset</button>
                          </div>
                        </section>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                            <label for="inputPaymentStatus" class="input__label">Payment status</label>
                                <input type="text" class="form-control input-style" id="inputPaymentStatus"
                                    name="paymentStatus"
                                    value="{{old('paymentStatus')}}"
                                    readOnly>
                      </div>
                      <div class="col-md-2">
                            <label for="inputSAPVoucherNumber" class="input__label">SAP voucher number</label>
                                <input type="text" class="form-control input-style" id="inputSAPVoucherNumber"
                                    name="SAPNumber"
                                    value="{{old('SAPNumber')}}"
                                    readOnly>
                      </div>
                      <div class="col-md-2">
                            <label for="inputPaymentDateTime" class="input__label">Payment date time</label>
                                <input type="text" class="form-control input-style" id="inputPaymentDateTime"
                                    name="paymentDateTime"
                                    value="{{old('paymentDateTime')}}"
                                    readOnly>
                      </div>
                      <div class="col-md-2">
                            <label for="inputPaymentBy" class="input__label">Payment by</label>
                                <input type="text" class="form-control input-style" id="inputPaymentBy"
                                    name="paymentBy"
                                    value="{{old('paymentBy')}}"
                                    readOnly>
                      </div>
                    </div>
                   
                    
                
              
                      
                    
                      
                      
              </div>
                     
              
                
                
              </form>
              <br/>
              <div class="row">
                <div class="col-md-12 ">
                  <a class='btn btn-primary icons' href="{{ route('site-rental.Create') }}" type='submit' value='submit'>add</a>
                </div>
              </div>
              <div class="table-responsive">
                  <table class="table table-hover table-strip" id="dataTables">
                      <thead>
                      </thread>                      
                      <div class="row">          
                      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th width="10%">Payment term</th>
                            <th width="11%" id = "HeaderChange">Total site under construction</th>
                            <th width="11%">Total site ready for installation</th>
                            <th width="11%">Total site on-air</th>
                            <th width="10%">Total site dismanted/terminated</th>
                            <th width="11%">Total rental fee per month (USD)</th>
                            <th width="11%">Total additional charge fee (USD)</th>
                            <th width="13%">Total site to be paid</th>
                            <th width="12%">Total amount to be paid (USD)</th>
                          </tr>
                        </thead>
                        <tbody>
                                               
                          <tr>
                          <td>
                            {{$monthly->paymentTerm}}
                          </td>
                           <td>{{$monthly->allUnderInstallation}}</td>
                           <td>{{$monthly->allStatus}}</td>
                           <td>{{$monthly->allOnAir}}</td>
                           <td>{{$monthly->allShutdown}}</td>
                           <td>{{number_format($monthly->netFee,2)}}</td>
                           <td>{{number_format($monthly->additionalFee,2)}}</td>
                           
                           <td>{{$monthly->allSites}}</td>
                           <td>{{number_format($monthly->netFee+$monthly->additionalFee,0)}}</td>
                           
                          </tr>
                        
                          
                         
                         <tr>
                         <td>
                            {{$quaterly->paymentTerm}}
                          </td>
                           <td>{{$quaterly->allUnderInstallation}}</td>
                           <td>{{$quaterly->allStatus}}</td>
                           <td>{{$quaterly->allOnAir}}</td>
                           <td>{{$quaterly->allShutdown}}</td>
                           <td>{{number_format($quaterly->netFee,2)}}</td>
                           <td>{{number_format($quaterly->additionalFee,2)}}</td>
                           <td>{{$quaterly->allSites}}</td>
                           <td>{{number_format($quaterly->netFee*3+$quaterly->additionalFee,0)}}</td>
                          
                         </tr>
                        
                        
                         
                         <tr>
                         <td>
                            {{$semesterly->paymentTerm}}
                          </td>
                           <td>{{$semesterly->allUnderInstallation}}</td>
                           <td>{{$semesterly->allStatus}}</td>
                           <td>{{$semesterly->allOnAir}}</td>
                           <td>{{$semesterly->allShutdown}}</td>
                           <td>{{number_format($semesterly->netFee,2)}}</td>
                           <td>{{number_format($semesterly->additionalFee,2)}}</td>
                           
                           <td>{{$semesterly->allSites}}</td>
                           <td>{{number_format($semesterly->netFee*6+$semesterly->additionalFee,0)}}</td>
                          
                         </tr>
                         
                        
                         
                         <tr>
                         <td>
                            {{$yearly->paymentTerm}}
                          </td>
                           <td>{{$yearly->allUnderInstallation}}</td>
                           <td>{{$yearly->allStatus}}</td>
                           <td>{{$yearly->allOnAir}}</td>
                           <td>{{$yearly->allShutdown}}</td>
                           <td>{{number_format($yearly->netFee,2)}}</td>
                           <td>{{number_format($yearly->additionalFee,2)}}</td>
                           
                           <td>{{$yearly->allSites}}</td>
                           <td>{{number_format($yearly->netFee*12+$yearly->additionalFee,0)}}</td>
                          
                         </tr>
                         <tr class="total">
                         <td >
                            Sub Total
                          </td>
                           <td>{{$monthly->allUnderInstallation
                            +$quaterly->allUnderInstallation
                            +$semesterly->allUnderInstallation
                             +$yearly->allUnderInstallation}}</td>
                           <td>{{$monthly->allStatus+$quaterly->allStatus+$semesterly->allStatus+$yearly->allStatus}}</td>
                           <td>{{$monthly->allOnAir+$quaterly->allOnAir+$semesterly->allOnAir+$yearly->allOnAir}}</td>
                           <td>{{$monthly->allShutdown+$quaterly->allShutdown+$semesterly->allShutdown+$yearly->allShutdown}}</td>
                           <td>{{number_format($monthly->netFee+$quaterly->netFee+$semesterly->netFee+$yearly->netFee,2)}}</td>
                           <td>{{number_format($monthly->additionalFee+$quaterly->additionalFee+$semesterly->additionalFee+$yearly->additionalFee,2)}}</td>
                           <td>{{$monthly->allSites+$quaterly->allSites+$semesterly->allSites+$yearly->allSites}}</td>
                           <td>{{number_format(($monthly->netFee + $monthly->additionalFee)+($quaterly->netFee*3+$quaterly->additionalFee)+($semesterly->netFee*6+$semesterly->additionalFee)+($yearly->netFee*12+$yearly->additionalFee),0)}}</td>                         
                         </tr>
                        
                         
                         
                        </tbody>
                    </table>
                   
                      <div class="container-fluid">
                        <div class="row">
                                    <div class="col-md-2 col-lg-2">
                                      <a class='btn btn-primary' id="detail" style="width:190px" type='submit' value='submit'>Show site details</a>
                                    </div>

                                    <div class="col-md-2 col-lg-2" >
                                     
                                      <a class='btn btn-primary' style="width:190px" id="updatePayment" type='submit' value='submit' data-toggle="modal" data-target="#smartModalCenter">Update payment status</a>
                                   
                                    </div>
                                   
                        </div>
                      </div>
                    <br/>
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

<!-- <script src="assets/dataTables/datatables.min.js"></script> -->
</body>
<!-- <script src="{{asset('assets/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable.js')}}"></script> -->
</div>

<!-- Button trigger modal -->
<!-- Button trigger modal -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->


  <!-- <script type="text/javascript" src="assets/dataTables/datatables.min.js">
    $(document).ready( function () {
    $('#dataTables').DataTable();
    } );
  </script> -->
  @include('components.smartModal')
  @include('components.ecoModal')
  <script src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script> 
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
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
              {$('#HeaderChange').html("Total site under construction");
                $('#updatePayment').attr('data-target','#smartModalCenter');
              }
          else 
              //alert("e.co")
              {$('#HeaderChange').html("Total site under installation");
                $('#updatePayment').attr('data-target','#ecoModalCenter');
              }
        });
        $('#updatePayment').on('show.bs.modal', function (event) {
 
            var modal = $(this)

            });

			});
      $('#myModal').modal('show')
      
			
	</script>

</html>


@endsection