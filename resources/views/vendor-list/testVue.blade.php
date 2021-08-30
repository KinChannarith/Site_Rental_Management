@extends('layouts/app')
@section("content")

<!-- include "Models/Site.php"; -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php
use Carbon\Carbon;
use App\Models\Helpers;
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

</html>
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
 
  <!-- vue -->
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <script type="module">
        import Vue from 'https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.esm.browser.js'
        </script>
    
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <!-- endVue -->
  <!-- <script type="text/javascript">
      $('Link1').click(function(){
        alert("kok");
      });
  </script> -->
  <title>Vendor-List</title>

  <!-- Template CSS -->
  

  <!-- google fonts -->
  
</head>

<div class="container-fluid content-top-gap">
      <!-- <div id="app">
        <h2>@{{test}}</h2>
        <div class="container">
            <articles></articles>
        </div>

      </div> -->
    <section data-navlink="Link1">
    <section class="forms">
    <div class="main-content">  
        <div class=" py-2 mb-4">
            <div class="cards__heading">
                    <h3><b>Vendor List</b><span></span></h3>
                          <br/>
                          @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                        </div>
                          @endif
            </div>
            
            <div class="row">
                                    <section class="col-md-3">
                                      <div class="form-group >
                                              <label for="inputVendorName" class="input__label">Vendor name</label>
                                              <select id="inputVendorName" class="form-control input-style"
                                                  name="VendorName" >
                                                  <option value="0" >All</option>
                                                
                                                </select>
                                              <span style="color:red">@error('status'){{$message}}@enderror</span>
                                      </div>
                                    </section>
                                    <section class="col-md-2">
                                      <div class="form-group >
                                              <label for="inputYear" class="input__label"><br/></label>
                                              <select id="inputVattin" class="form-control input-style"
                                                  name="Vattin" >
                                                  <option value="0" >All</option>
                                                 
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
        </div>
        <div class="table-responsive">
                            
                                                  
                                          
                                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                      <tr>
                                        <th width="40%">Vendor Name</th>
                                        <th width="30%">VATTIN</th>
                                        <th width="30%"></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                   
                                    </tbody>
                                </table>

                                  
                                <br/>
        </div>
   
    </section>
    </section>
    

    <div class="modal fade" id="vendorModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            
            <div class="modal-content">
            <form action="{{route('vendor-list.Update')}}" method="post">
                <!-- {{csrf_field()}} -->
                    <div class="modal-body">
                                            <div>
                                              <br/> <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                      <label for="" class="pb-2">Vendor name</label>
                                                      <input type='text' class="form-control input-style"
                                                        name="vendor_name" id="vendor_name"
                                                        /> 
                                                        <input type="hidden" class="form-control input-style"
                                                        name="id" id="id"
                                                        /> 
                                                        <div class="pb-4"></div>
                                                        <div class="pb-4"></div>

                                                        <label for="" class="pb-2">VATTIN</label>
                                                      <input type='text' class="form-control input-style"
                                                        name="vattin" id="vattin"/> 
                                                        <div class="pb-4"></div>
                                                        <div class="pb-4"></div>
                                            </div>
                    </div>
                    <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:130px">Cancel</button>
                              <button type="submit" class="btn btn-primary" style="width:130px">Confirm</button>
                    </div>
                   
            </div>
        </div>
    </div>

    </form>
</div>

<script src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script> 
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<script  src="{{ asset('assets/js/bootstrap4.min.js') }}" ></script>

<script type="text/javascript">
			$(function(){

				$('.active').removeClass('active');
				$('#Link4').addClass('active');

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
      // $('#myModal').modal('show')
      $(document).on('click','.edit',function(){
        var _this= $(this).parents('tr');
        $('#vendor_name').val(_this.find('.vendor_name').text());
        $('#vattin').val(_this.find('.vattin').text());
        $('#id').val(_this.find('.id').text());
      });
      // $('#edit').click(function(){
      //   var _this= $(this).parents('tr');
      //   $('#vendor_name').val(_this.find('.vendor_name').text());
      //   $('#vattin').val(_this.find('.vattin').text());
      // });
      
			
	</script>
  <script src="{{asset('js/app.js')}}"></script>

@endsection
