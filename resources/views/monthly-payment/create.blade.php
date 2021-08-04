@extends('layouts/app')
@section("content")
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

  <title>Monthly-Payment-New</title>

  <!-- Template CSS -->
  

  <!-- google fonts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
   $(document).ready(function(){

    $("#inputNewSiteID").focusout(function(){
        var idp = $("#inputNewSiteID").val();
        var datas = {id:idp };
        var datatype = 'jsonp';
        $.get("{{ URL::to('monthly-payment/create/load')}}",datas,function(data){
            //console.log(data);
                 if(data=="")
                {
                    alert("No site ID="+idp+"! Please input New Site ID again.")
                    $("#inputNewSiteID").val("");
                    $("#inputOldSiteID").val("");
                        $("#inputStatus").val("");
                        $("#inputContact").val("");
                        $("#inputAddress").val("");
                        $("#inputFullName").val("");
                    $("#inputOldSiteIDHide").val("");
                        $("#inputStatusHide").val("");
                        $("#inputContactHide").val("");
                        $("#inputAddressHide").val("");
                        $("#inputFullNameHide").val("");
                }
                
                else
                {
                    $.each(data,function(i,value){
                        $("#inputOldSiteID").val(value.oldID);
                        $("#inputStatus").val(value.status);
                        $("#inputContact").val(value.contact);
                        $("#inputAddress").val(value.address);
                        $("#inputFullName").val(value.fullname);
                        $("#inputOldSiteIDHide").val(value.oldID);
                        $("#inputStatusHide").val(value.status);
                        $("#inputContactHide").val(value.contact);
                        $("#inputAddressHide").val(value.address);
                        $("#inputFullNameHide").val(value.fullname);
                    
                    });
                }
                
            
        })
        
       

    });
    $("#datetimepicker").focusout(function(){
        $("#datetimepicker").val($.datepicker.formatDate('M yy', new Date()));
    });
    });
</script>
  
</head>

<body class="sidebar-menu-collapsed">
<div class="se-pre-con"></div>
<section>
  
<!-- main content start -->
<div class="main-content">
<form action="{{ url('/monthly-payment/store')}}" method="post">
    <!-- content -->
    @csrf
    <div class="container-fluid content-top-gap">
    <input type="hidden" name="userCreated" value={{ Auth::user()->id }}>
        <!-- breadcrumbs -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb my-breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Monthly-Payment</li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
        <!-- //breadcrumbs -->
        <!-- forms -->
        <section class="forms">
            <!-- forms 1 -->
            <!-- <div class="card card_border py-2 mb-4">
                <div class="cards__heading">
                    <h3>Create New Site Rental<span></span></h3>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="input__label">Email address</label>
                            <input type="email" class="form-control input-style" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="input__label">Password</label>
                            <input type="password" class="form-control input-style" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        <div class="form-check check-remember check-me-out">
                            <input type="checkbox" class="form-check-input checkbox" id="exampleCheck1">
                            <label class="form-check-label checkmark" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-style mt-4">Submit</button>
                    </form>
                </div>
            </div> -->
            <!-- //forms 1 -->

            <!-- forms 1 -->
            <div class="card card_border py-2 mb-4">
                <div class="cards__heading">
                    <h3>Site Information<span></span></h3>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputNewSiteID" class="input__label" id="NewSiteID">New Site ID</label>
                                <input type="text" class="form-control input-style" name="newID" id="inputNewSiteID"
                                    placeholder="New Site ID">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputOldSiteID" class="input__label">Old Site ID</label>
                                <input type="text" class="form-control input-style" id="inputOldSiteID"
                                    disabled="true">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4" class="input__label">Status</label>
                                <input type="text" class="form-control input-style" id="inputStatus"
                                disabled="true">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4" class="input__label">Owner's Full Name</label>
                                <input type="text" class="form-control input-style" id="inputFullName"
                                disabled="true">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4" class="input__label">Contact</label>
                                <input type="text" class="form-control input-style" id="inputContact"
                                disabled="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress" class="input__label">Site Address</label>
                            <input type="text" class="form-control input-style" id="inputAddress"
                            disabled="true">
                        </div>


                        <!-- hidden -->
                      
                                <input type="hidden" name="oldID" class="form-control input-style" id="inputOldSiteIDHide"
                                    >
                               
                                <input type="hidden" name="status" class="form-control input-style" id="inputStatusHide"
                                >
                              
                                <input type="hidden" name="fullname" class="form-control input-style" id="inputFullNameHide"
                               >
                          
                                <input type="hidden" name="contact" class="form-control input-style" id="inputContactHide"
                                >
                            
                        
                            <input type="hidden" name="address" class="form-control input-style" id="inputAddressHide"
                           >
                       
                    
                </div>
            </div>
           


            <!-- forms 1 -->
            <div class="card card_border py-2 mb-4">
                <div class="cards__heading">
                    <h3>Payment Information<span></span></h3>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-row">
                        <section class="col-md-3">
                            <div class="form-group">
                               <label for="datetimepicker" class="input__label">Payment Month</label>
                                <div class='input-group date' >
                                    <input type='date' name="paymonth" value="{{old('paymonth')}}"  id='datetimepicker' class="form-control input-style" /> 
                                </div>
                            </div>

                        </section>
                        <section class="col-md-3">
                            <div class="form-group">
                               <label for="datetimepicker2" class="input__label">Pay Date</label>
                                <div class='input-group date'  >
                                    <input type='date'  id='datetimepicker2' class="form-control input-style"  name="paydate" value="{{old('paydate')}}"/> 
                                </div>
                            </div>

                        </section>
                        <div class="form-group col-md-6">
                                <label for="inputDescription" class="input__label">Description</label>
                                <input type="text" name="description" class="form-control input-style" id="inputDescription"
                                    placeholder="Description">
                        </div>
                       
                        
                        </div>
                        
                        <div class="form-group">
                            <label for="inputRemark" class="input__label">Remark</label>
                            <input type="text" name="remark" class="form-control input-style" id="inputRemark"
                                placeholder="Remark">
                        </div>
                        <!-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="input__label">City</label>
                                <input type="text" class="form-control input-style" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState" class="input__label">State</label>
                                <select id="inputState" class="form-control input-style">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip" class="input__label">Zip</label>
                                <input type="text" class="form-control input-style" id="inputZip">
                            </div>
                        </div>
                        <div class="form-check check-remember check-me-out">
                            <input class="form-check-input checkbox" type="checkbox" id="gridCheck">
                            <label class="form-check-label checkmark" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-style mt-4">Sign in</button> -->
                    <!-- </form> -->
                </div>
            </div>
            <!-- //forms 1 -->
            </form>
            <div class="form-group row">
                <div class="col-md-9">
                    
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-success btn-style">Save</button>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-danger btn-style btn-border">Cancel</button>
                </div>
                
            </div>
           

        </section>
        <!-- //forms -->
        </section>
        <!-- //forms  -->

    </div>
    <!-- //content -->

</div>
<!-- main content end-->
</section>
<!--footer section start-->

<!--footer section end-->
<!-- move top -->
<button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button>



</body>


</html>

@endsection


