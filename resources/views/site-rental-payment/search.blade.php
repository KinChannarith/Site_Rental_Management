@extends('layouts/app')
@section("content")
include "Models/Site.php";
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php

// if data 'search' posted in POST method, make it safe in HTML then store it in $search. If 'search' data was not posted, fill it with an empty string ('')
$search = (isset($_POST['search'])) ? htmlentities($_POST['search']) : '';

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
  <link rel="stylesheet" href="{{asset('assets/DataTables/datatables.min.css') }}">
  
  <title>Site-Rental-List</title>

  <!-- Template CSS -->
  

  <!-- google fonts -->
  
</head>
<div class="container-fluid content-top-gap">
<body class="sidebar-menu-collapsed">
<div class="se-pre-con"></div>
<section>
<section class="forms">
<!-- main content start -->
  <div class="main-content">
      <!-- content -->
      <div class="card card_border py-2 mb-4">
          <div class="cards__heading">
              <h3>Site Rental List<span></span></h3>
              
              <br/>
              @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                            <p>{{ $message }}</p>
                            </div>
              @endif
              <div class="container">
                
                <form action="{{url('/site-rental/search')}}" type="get">
                <!-- <div class="form-row">
                        <section class="col-md-2">
                            <div class="form-group">
                               <label for="datetimepicker" class="input__label">Start Date from</label>
                                <div class='input-group date' id='datetimepicker'>
                                    <input type='date' class="form-control input-style"
                                    name="startDate"
                                    value="{{'startDate'}}" /> 
                                   
                                </div>
                                <span style="color:red">@error('startDate'){{$message}}@enderror</span>
                            </div>

                        </section>
                        <section class="col-md-2">
                            <div class="form-group">
                               <label for="datetimepicker2" class="input__label">To</label>
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='date' class="form-control input-style"
                                    name="endDate"
                                    value="{{'endDate'}}" /> 
                                    
                                </div>
                                <span style="color:red">@error('endDate'){{$message}}@enderror</span>
                            </div>

                        </section>
                </div> -->
                <div class="row">
                      <div class="form-group col-md-2">
                                <select id="inputInitialStatus" class="form-control input-style" 
                                name="filter"
                                value="{{$_GET['filter']}}">
                                    <option value="NewID" >New ID</option>
                                    <option value="OwnerName">Owner Name</option>
                                    
                                    
                                </select>
                               
                      </div>
                      <div class="col-8">
                        <div class="form-group">
                            <input type="text" class="form-control input-style" id="inputAddress"
                                name="search"
                                value="<?= $search ?>"
                                placeholder="search">                              
                        </div>
                        </div>
                      <div class="col-md-1">
                          <button id="search" type="submit" class="btn btn-primary btn-style btn-border">Search</button>
                      </div>
                </div>
              </form>
              <div class="table-responsive">
                  <table class="footable table table-hover toggle-arrow-tiny" id="order_table">
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
                          <td><a class='btn btn-primary fa fa-eye' href="view\{{$site->id}}" type='submit' value='submit' > </a>
                          <a class='btn btn-success fa fa-pencil' href="edit\{{$site->id}}" type='submit' value='submit'> </a>
                          @csrf
                          @method('DELETE')
                          <a class='btn btn-danger fa fa-trash' onclick="return confirm('Are you sure to delete the item?')" href="delete\{{$site->id}}" type='submit' value='submit'> </a>
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
                            <div class="col-10">
                          
                            </div>
                        
                            <div class="col-2">
                                {!!$sites->links(('pagination::bootstrap-4'))!!}
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


</body>
<script src="{{asset('assets/DataTables/datatables.min.js')}}"></script>

</div>


</html>
@endsection