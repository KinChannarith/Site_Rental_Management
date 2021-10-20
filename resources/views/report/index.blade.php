@extends('layouts/app')
@section("content")
<!-- include "Models/Site.php"; -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php
use App\Models\Helpers;
// if data 'search' posted in POST method, make it safe in HTML then store it in $search. If 'search' data was not posted, fill it with an empty string ('')
$search = (isset($_GET['search'])) ? htmlentities($_GET['search']) : '';
$filter = (isset($_GET['filter'])) ? htmlentities($_GET['filter']) : '';
$year = (isset($_GET['year'])) ? htmlentities($_GET['year']) : '';
$status = (isset($_GET['status'])) ? htmlentities($_GET['status']) : '';
$sortBy = (isset($_GET['sortBy'])) ? htmlentities($_GET['sortBy']) : '';
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
 
  
  <title>Report-List</title>

  <!-- Template CSS -->
  

  <!-- google fonts -->
 
  
</head>
<div class="container content-top-gap">

<section data-navlink="Link3">
<section class="forms">
<!-- main content start -->
  <div class="main-content">
      <!-- content -->
      <div class="col-md-12">
      
            <form  action="{{route('monthly-payment.ExportIntoExcel')}}" method="GET">
      
                <div class="row">
                    
                    <div class="form-group col-md-2">
                                    <label for="datetimepicker" class="input__label">Year</label>
                                        <div class='input-group date' id='datetimepicker'>
                                            <input type='year' class="form-control input-style"
                                            name="year"
                                            value="<?= $year ?>" /> 
                                        
                                        </div>
                                        <span style="color:red">@error('startDate'){{$message}}@enderror</span>
                    </div>

                    
                        
                        
                        <div class="form-group col-md-4">
                                <label for="inputStatus" class="input__label">Status</label>
                                <select id="inputStatus" class="form-control input-style"
                                    name="status"
                                   >
                                   <option selected> </option>
                                    <?php
                                        for ($i=0;$i<count(Helpers::getSiteStatus());$i++){
                                          
                                        ?>
                                        <option {{ $status==Helpers::getSiteStatus()[$i] ? "selected" :""  }} value="<?=Helpers::getSiteStatus()[$i];?>"><?=Helpers::getSiteStatus()[$i];?></option>
                                        <?php
                                        }
                                        ?>  
                                </select>
                                <span style="color:red">@error('status'){{$message}}@enderror</span>
                        </div>
                        
                            <div class="form-group col-md-4">
                            <label for="sortBy" class="input__label">Sort By</label>
                                <select id="sortBy" class="form-control input-style"
                                    name="sortBy">
                                    <option value="" ></option>
                                    <option value="newID" {{ $status =="newID"? "selected" :""  }} >New ID</option>
                                    <option value="bankName" {{ $status=="bankName"? "selected" :""  }}>Bank Name</option>
                                    <option value="startDate" {{ $status=="startDate"? "selected" :""  }}>Agreement Start Date</option>
                                    <option value="netFee" {{$status=="netFee"? "selected" :""  }}>Net Fee</option> 
                                </select>
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
                
                            <div class="form-group col-md-9">
                                <div class="form-group">
                                    <input type="text" class="form-control input-style" id="inputAddress"
                                        name="search"
                                        value="<?= $search ?>"
                                        placeholder="search">                              
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" id="btnSearch" class="btn btn-primary btn-style btn-border">Export</button>
                            </div>
                </div>
            </form>
                

         
                  
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

<!-- <script src="{{asset('assets/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable.js')}}"></script> -->
<script src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script> 
<script type="text/javascript">
			$(function(){

				$('.active').removeClass('active');
				$('#Link3').addClass('active');

			});
			
	</script> 


</html>


@endsection