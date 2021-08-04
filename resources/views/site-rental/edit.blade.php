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

  <title>Site-Rental-New</title>

  <!-- Template CSS -->
  

  <!-- google fonts -->
  
</head>

<body class="sidebar-menu-collapsed">
<div class="se-pre-con"></div>
<section>
  
<!-- main content start -->
<div class="main-content">
    <form action="{{ url('/site-rental/update')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$site->id}}">
    <!-- content -->
    <div class="container-fluid content-top-gap">

        <!-- breadcrumbs -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb my-breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Site-Rental</li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <!-- //breadcrumbs -->
        <!-- forms -->
        <section class="forms">
            @if($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input <br><br>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach

                </ul>
            </div>
            @endif
   
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
                    
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputSiteID" class="input__label">New Site ID</label>
                                <input type="text" class="form-control input-style" name="newID"
                                    value="{{$site->newID}}"
                                    placeholder="New Site ID" readonly >
                                </input>
                                <span style="color:red">@error('newID'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputOldID" class="input__label">Old Site ID</label>
                                <input type="text" class="form-control input-style" id="inputOldID"
                                    name="oldID"
                                    value="{{$site->oldID}}"
                                    placeholder="Old Site ID">
                                    <span style="color:red">@error('oldID'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputStatus" class="input__label">Status</label>
                                <select id="inputStatus" class="form-control input-style"
                                    name="status"
                                   >
                                    <option value="On Air" {{ $site->status=="On Air"? "selected" :""  }} >On Air</option>
                                    <option value="shut down" {{ $site->status=="shut down"? "selected" :""  }}>shut down</option>
                                    <option value="Status" {{ $site->status=="Status"? "selected" :""  }}>Status</option>
                                    <option value="Under Installation" {{ $site->status=="Under Installation"? "selected" :""  }}>Under Installation</option>   
                                </select>
                                <span style="color:red">@error('status'){{$message}}@enderror</span>
                            </div>
                            <!-- <div class="form-group col-md-6">
                                <label for="inputPassword4" class="input__label">Password</label>
                                <input type="password" class="form-control input-style" id="inputPassword4"
                                    placeholder="Password">
                            </div> -->
                        </div>
                        <div class="form-group">
                            <label for="inputAddress" class="input__label">Site Address</label>
                            <input type="text" class="form-control input-style" id="inputAddress"
                                name="address"
                                value="{{$site->address}}"
                                placeholder="House No, Street No, Commune, Distinct, City/Province, Country">
                                <span style="color:red">@error('address'){{$message}}@enderror</span>
                        </div>
                        
                    
                </div>
            </div>
            <!-- //forms 1 -->
            <div class="card card_border py-2 mb-4">
                <div class="cards__heading">
                    <h3>Owner Information<span></span></h3>
                </div>
                <div class="card-body">
                  <!-- <h3 class="pb-3">Primary-Owner</h3> -->
                    
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputInitialStatus" class="input__label">Initial Status</label>
                                <select id="inputInitialStatus" class="form-control input-style" 
                                name="initialStatus"
                                >
                                    <option  value="N/A" {{ $site->initialStatus=="N/A"? "selected" :""  }}>N/A</option>
                                    <option value="Mr." {{ $site->initialStatus=="Mr."? "selected" :""  }}>Mr.</option>
                                    <option value="Mrs." {{ $site->initialStatus=="Mrs."? "selected" :""  }}>Mrs.</option>
                                    <option value="Ms." {{ $site->initialStatus=="Ms."? "selected" :""  }}>Ms.</option>
                                    <option value="Dr." {{ $site->initialStatus=="Dr."? "selected" :""  }}>Dr.</option>
                                    
                                </select>
                                <span style="color:red">@error('initialStatus'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputFullname" class="input__label">Full-Name</label>
                                <input type="text" class="form-control input-style" id="inputFullname"
                                name="fullname"
                                value="{{$site->fullname}}"
                                    placeholder="Full-Name">
                                <span style="color:red">@error('fullname'){{$message}}@enderror</span>    
                            </div>
                            
                            <!-- <div class="form-group col-md-2">
                                <label for="inputEmail4" class="input__label">Old Site ID</label>
                                <input type="email" class="form-control input-style" id="inputEmail4"
                                    placeholder="Old Site ID">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState" class="input__label">Status</label>
                                <select id="inputState" class="form-control input-style">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div> -->
                            <!-- <div class="form-group col-md-6">
                                <label for="inputPassword4" class="input__label">Password</label>
                                <input type="password" class="form-control input-style" id="inputPassword4"
                                    placeholder="Password">
                            </div> -->
                            <div class="form-group col-md-3">
                                <label for="inputcontact" class="input__label">Contact</label>
                                <input type="text" class="form-control input-style" id="inputContact"
                                    name="contact"
                                    value="{{$site->contact}}"
                                    placeholder="Contact">
                                <span style="color:red">@error('contact'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputOwnerAddress" class="input__label">Address</label>
                            <input type="text" class="form-control input-style" id="inputOwnerAddress"
                                name="ownerAddress"
                                value="{{$site->ownerAddress}}"
                                placeholder="House No, Street No, Commune, Distinct, City/Province, Country">
                            <span style="color:red">@error('ownerAddress'){{$message}}@enderror</span>
                        </div>
                    
                </div>
            </div>
            <!-- //forms 2 -->
            <div class="card card_border py-2 mb-4">
                <div class="cards__heading">
                    <h3>Bank Information<span></span></h3>
                </div>
                <div class="card-body">
                  <!-- <h3 class="pb-3">Primary-Owner</h3> -->
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputBankName" class="input__label">Bank Name</label>
                                <input type="text" class="form-control input-style" id="inputBankName"
                                    name="bankName"
                                    value="{{$site->bankName}}"
                                    placeholder="Bank Name">
                                    <span style="color:red">@error('bankName'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputBankAccountName" class="input__label">Bank Account Name</label>
                                <input type="text" class="form-control input-style" id="inputBankAccountName"
                                    name="bankAccountName"
                                    value="{{$site->bankAccountName}}"
                                    placeholder="Bank Account Name">
                                <span style="color:red">@error('bankAccountName'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputBankAccountNumber" class="input__label">Bank Account Number</label>
                                <input type="text" class="form-control input-style" id="inputBankAccountName"
                                    name="bankAccountNumber"
                                    value="{{$site->bankAccountNumber}}"
                                    placeholder="Bank Account Number">
                                <span style="color:red">@error('bankAccountName'){{$message}}@enderror</span>
                            </div>
                        </div>
                        
                </div>
            </div>
            <!-- //forms 2 -->



            <!-- forms 1 -->
            <div class="card card_border py-2 mb-4">
                <div class="cards__heading">
                    <h3>Period of Agreement<span></span></h3>
                </div>
                <div class="card-body">
                    
                        <div class="form-row">
                        <section class="col-md-3">
                            <div class="form-group">
                               <label for="datetimepicker" class="input__label">Start Date</label>
                                <div class='input-group date' id='datetimepicker'>
                                    <input type='date' class="form-control input-style"
                                    name="startDate"
                                    value="{{$site->startDate}}"/> 
                                   
                                </div>
                                <span style="color:red">@error('startDate'){{$message}}@enderror</span>
                            </div>

                        </section>
                        <section class="col-md-3">
                            <div class="form-group">
                               <label for="datetimepicker2" class="input__label">End Date</label>
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='date' class="form-control input-style"
                                    name="endDate"
                                    value="{{$site->endDate}}" /> 
                                    
                                </div>
                                <span style="color:red">@error('endDate'){{$message}}@enderror</span>
                            </div>

                        </section>
                        <div class="form-group col-md-2">
                                <label for="inputNumberYear" class="input__label">Number of Year</label>
                                <input type="text" class="form-control input-style" id="inputNumberYear"
                                    name="noYear"
                                    value="{{$site->noYear}}"
                                    placeholder="Number of Year">
                                <span style="color:red">@error('noYear'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group col-md-2">
                                <label for="inputNetFree" class="input__label">Net Fee($)</label>
                               
                                    <input type="number" class="form-control input-style" id="inputNetFee"
                                    placeholder="Net Fee" min="0"
                                    name="netFee"
                                    value="{{$site->netFee}}"
                                    >
                                    <span style="color:red">@error('netFee'){{$message}}@enderror</span>
                                
                        </div>
                        <div class="form-group col-md-2">
                                <label for="inputPmtMethod" class="input__label">Pmt Method</label>
                               
                                    <input type="number" class="form-control input-style" id="inputPmtMethod"
                                    placeholder="Pmt Method" min="0"
                                    name="pmtMethod"
                                    value="{{$site->pmtMethod}}"
                                    >
                                <span style="color:red">@error('pmtMethod'){{$message}}@enderror</span>
                                
                        </div>
                        
                            <!-- <div class="form-group col-md-6">
                                <label for="inputPassword4" class="input__label">Password</label>
                                <input type="password" class="form-control input-style" id="inputPassword4"
                                    placeholder="Password">
                            </div> -->
                        </div>
                        <div class="form-group">
                            <label for="inputDueDate" class="input__label">Due Date</label>
                            <input type="text" class="form-control input-style" id="inputDueDate"
                                    name="dueDate"
                                    value="{{$site->dueDate}}"
                                placeholder="Due Date">
                            <span style="color:red">@error('dueDate'){{$message}}@enderror</span>
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
                    
                </div>
            </div>
            <div class="card card_border py-2 mb-4">
                <div class="card-body">
                    <div class="form-group">
                                <label for="inputRemark" class="input__label">Remark</label>
                                <input type="text" class="form-control input-style" id="inputRemark"
                                    name="remark"
                                    value="{{$site->remark}}"
                                    placeholder="Remark">
                                <span style="color:red">@error('remark'){{$message}}@enderror</span>
                    </div> 
                </div> 
            </div>
            <!-- //forms 1 -->
    
            <div class="form-group row">
                <div class="col-md-9">
                    
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-success btn-style">Save</button>
                </div>
                <div class="col-md-1">
                    <a type="submit" href="{{ route('site-rental.Index') }}" class="btn btn-danger btn-style btn-border">Cancel</a>
                </div>
                
            </div>
     

        </section>
        <!-- //forms -->
        </section>
        <!-- //forms  -->
    </form>   
    </div>
    <!-- //content -->
    
</div>
<!-- main content end-->
</section>
<!--footer section start-->

<!--footer section end-->
<!-- move top -->
<!-- <button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button> -->


</body>


</html>
@endsection