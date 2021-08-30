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
  <script src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script> 
  <!-- <script type="text/javascript">
      $('Link1').click(function(){
        alert("kok");
      });
  </script> -->
  <title>Site-Rental-List</title>

  <!-- Template CSS -->
  

  <!-- google fonts -->
  
</head>
<div class="container content-top-gap">
<section data-navlink="Link1">

<section class="forms">
<!-- main content start -->
  <div class="main-content">
      <!-- content -->
      <div class="card card_border py-2 mb-4">
          <div class="cards__heading">
              <h3><b>Site Rental List</b><span></span></h3>
              
              <br/>
              @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                            <p>{{ $message }}</p>
                            </div>
              @endif
              <div>
                
                <form action="{{route('site-rental.Search')}}" method="GET">
                
                        <div class="row">
                        <section class="col-md-2">
                            <div class="form-group">
                               <label for="datetimepicker" class="input__label">Start Date from</label>
                                <div class='input-group date' id='datetimepicker'>
                                    <input type='date' class="form-control input-style"
                                    name="startDateFrom"
                                    value="<?= $startDateFrom ?>" /> 
                                   
                                </div>
                                <span style="color:red">@error('startDate'){{$message}}@enderror</span>
                            </div>

                        </section>
                        <section class="col-md-2">
                            <div class="form-group">
                               <label for="datetimepicker2" class="input__label">To</label>
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='date' class="form-control input-style"
                                    name="startDateTo"
                                    value="<?= $startDateTo ?>" /> 
                                    
                                </div>
                                <span style="color:red">@error('endDate'){{$message}}@enderror</span>
                            </div>

                        </section>
                        <section class="col-md-2">
                            <div class="form-group">
                               <label for="datetimepicker" class="input__label">End Date from</label>
                                <div class='input-group date' id='datetimepicker'>
                                    <input type='date' class="form-control input-style"
                                    name="endDateFrom"
                                    value="<?= $endDateFrom ?>" /> 
                                   
                                </div>
                                <span style="color:red">@error('endDate'){{$message}}@enderror</span>
                            </div>

                        </section>
                        <section class="col-md-2">
                            <div class="form-group">
                               <label for="datetimepicker2" class="input__label">To</label>
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='date' class="form-control input-style"
                                    name="endDateTo"
                                    value="<?= $endDateTo ?>" /> 
                                    
                                </div>
                                <span style="color:red">@error('endDate'){{$message}}@enderror</span>
                            </div>

                        </section>
                        <section class="col-md-4">
                          <div class="form-group >
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
                        </section>
                        </div>
                   
                    
                
              
                      
                    
                        <div class="row">
                        <section class="col-md-2">
                          <div class="form-group">
                                  <select id="inputFilter" class="form-control input-style" 
                                  name="filter"
                                  value="<?= $filter ?>">
                                      <option  value="NewID" {{ $filter =="NewID"? "selected" :""  }}>New ID</option>
                                      <option value="OwnerName" {{ $filter =="OwnerName"? "selected" :""  }}>Owner Name</option>
                                      
                                  </select>
                                  
                          </div>
                        </section>
                        <section class="col-md-8">
                        <div class="form-group">
                            <div class="form-group form-group">
                                <input type="text" class="form-control input-style" id="inputAddress"
                                    name="search"
                                    value="<?= $search ?>"
                                    placeholder="search">                              
                            </div>
                        </div>
                        </section>
                        <section class="col-md-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-style btn-border">Search</button>
                        </div>
                        </section>
                        </div>
                     
              
                
                
              </form>
              <a class='btn btn-success icons' href="{{ route('site-rental.Create') }}" type='submit' value='submit'>add</a>
              
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
                            <th width="10%">Start Date</th>
                            <th width="10%">End Date</th>
                            <th width="8%">Net Fee</th>
                            <th width="10%">Remark</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($sites as $site)
                         
                          <tr>
                          <td><a class='btn btn-primary icons' id="btnEye" href="{{ route('site-rental.View',$site->id) }}" type='submit' value='submit' >visibility</a>
                          <a class='btn btn-success icons' href="{{ route('site-rental.Edit',$site->id) }}" type='submit' value='submit'>edit</a>
                          @csrf
                          @method('DELETE')
                          <a class='btn btn-danger icons' onclick="return confirm('Are you sure to delete the item?')" href="delete\{{$site->id}}" type='submit' value='submit'>delete</a>
                          </td>
                           <td>{{$site->newID}}</td>
                           <td>{{$site->oldID}}</td>
                           <td>{{$site->stringCut($site->address,20)}}</td>
                           <td>{{$site->status}}</td>
                           <td>{{$site->dateFormat($site->startDate,'d-m-Y')}}</td>
                           <td>{{$site->dateFormat($site->endDate,'d-m-Y')}}</td>
                           <td>{{$site->netFee}}</td>
                           <td>{{$site->stringCut($site->remark,10)}}</td>
                           <!-- <td>{{$site->remark}}</td> -->
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                    <div class="container">
                      <div class="row">
                            <div class="col-md-10">
                              <p>Total records: {{ $sites->total()}}</p>
                            </div>
                        
                            <div class="col-md-2">
                                {!!$sites->appends(request()->input())->links(('pagination::bootstrap-4'))!!}
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

<!-- <script src="assets/dataTables/datatables.min.js"></script> -->
</body>
<!-- <script src="{{asset('assets/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable.js')}}"></script> -->
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

</html>


@endsection