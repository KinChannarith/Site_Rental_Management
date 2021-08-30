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
    <form action="{{ url('/site-rental/store')}}" method="post">
    @csrf
    <!-- content -->
    <div class="container-fluid content-top-gap">
    <input type="hidden" name="userCreated" value={{ Auth::user()->id }}>
        <!-- breadcrumbs -->
        <!-- <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb my-breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Site-Rental</li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav> -->
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
            
                <div>
                    <h3>Site Information<span></span></h3>
                </div>
                <div class="col-md-12">
                    
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputSiteID" class="input__label">New Site ID</label>
                                <input type="text" class="form-control input-style" name="newID"
                                    value="{{old('newID')}}"
                                    placeholder="New Site ID">
                                </input>
                                <span style="color:red">@error('newID'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputOldID" class="input__label">Old Site ID</label>
                                <input type="text" class="form-control input-style" id="inputOldID"
                                    name="oldID"
                                    value="{{old('oldID')}}"
                                    placeholder="Old Site ID">
                                    <span style="color:red">@error('oldID'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputStatus" class="input__label">Status</label>
                                <select id="inputStatus" class="form-control input-style"
                                    name="status"
                                    value="{{old('status')}}">
                                    <option selected value="On Air">On Air</option>
                                    <option value="shut down">shut down</option>
                                    <option value="Status">Status</option>
                                    <option value="Under Installation">Under Installation</option>   
                                </select>
                                <span style="color:red">@error('status'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputSiteOwner" class="input__label">Site Owner</label>
                                <select id="inputSiteOwner" class="form-control input-style"
                                    name="siteOwner"
                                    value="{{old('siteOwner')}}">
                                    <option selected value="SmartAxiata">Smart Axiata</option>
                                    <option value="e.co">e.co</option> 
                                </select>
                                <span style="color:red">@error('status'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-2">
                               <label for="datetimepicker4" class="input__label">Construction Date</label>
                                <div class='input-group date' id='datetimepicker4'>
                                    <input type='date' class="form-control input-style"
                                    name="constructionDate"
                                    value="{{old('constructionDate')}}" /> 
                                   
                                </div>
                                <span style="color:red">@error('startDate'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-2">
                               <label for="datetimepicker5" class="input__label">Adjusted RFAI Date</label>
                                <div class='input-group date' id='datetimepicker5'>
                                    <input type='date' class="form-control input-style"
                                    name="RFAIDate"
                                    value="{{old('RFAIDate')}}" /> 
                                   
                                </div>
                                <span style="color:red">@error('RFAIDate'){{$message}}@enderror</span>
                            </div>
                        <div class="form-group col-md-2">
                                <label for="inputContractNo" class="input__label">Additional Charge Fee</label>
                                <input type="number" class="form-control input-style" id="inputContractNo"
                                     value="{{old('additionalFee')}}" name="additionalFee" placeholder="Additional Charge Fee">
                                     <span style="color:red">@error('additionalFee'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group col-md-2">
                                <label for="tenant" class="input__label">Tenant</label>
                                <input type="text" class="form-control input-style" id="tenant"
                                     value="{{old('tenant')}}" name="tenant" placeholder="tenant">
                                     <span style="color:red">@error('tenant'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAdditionalServices" class="input__label">Additional Services</label>
                            <input type="text" class="form-control input-style" id="inputAdditionalServices"
                                name="additionalService"
                                value="{{old('additionalService')}}"
                                placeholder="additional Service">
                                <span style="color:red">@error('additionalService'){{$message}}@enderror</span>
                        </div>
                            
                            <!-- <div class="form-group col-md-6">
                                <label for="inputPassword4" class="input__label">Password</label>
                                <input type="password" class="form-control input-style" id="inputPassword4"
                                    placeholder="Password">
                            </div> -->
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress" class="input__label">Site Address</label>
                            <input type="text" class="form-control input-style" id="inputAddress"
                                name="address"
                                value="{{old('address')}}"
                                placeholder="House No, Street No, Commune, Distinct, City/Province, Country">
                                <span style="color:red">@error('address'){{$message}}@enderror</span>
                        </div>
                        
                    
                </div>
            
            <!-- //forms 1 -->
                <div>
                <h3>Owner Information</h3>
                </div>
                <div class="col-md-12"> 
                <!-- <h3 class="pb-3">Primary-Owner</h3> -->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <div class="form-group">
                                <label for="inputInitialStatus" class="input__label">Initial Status</label>
                                <select id="inputInitialStatus" class="form-control input-style" 
                                name="initialStatus"
                                value="{{old('initialStatus')}}">
                                    <option selected value="N/A" >N/A</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Dr.">Dr.</option>
                                    
                                </select>
                                <span style="color:red">@error('initialStatus'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="inputFullname" class="input__label">Full-Name</label>
                                <input type="text" class="form-control input-style" id="inputFullname"
                                name="fullname"
                                value="{{old('fullname')}}"
                                    placeholder="Full-Name">
                                <span style="color:red">@error('fullname'){{$message}}@enderror</span>    
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                                <label for="inputcontact" class="input__label">Contact</label>
                                <input type="text" class="form-control input-style" id="inputContact"
                                    name="contact"
                                    value="{{old('contact')}}"
                                    placeholder="Contact">
                                <span style="color:red">@error('contact'){{$message}}@enderror</span>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="inputOwnerAddress" class="input__label">Address</label>
                            <input type="text" class="form-control input-style" id="inputOwnerAddress"
                                name="ownerAddress"
                                value="{{old('ownerAddress')}}"
                                placeholder="House No, Street No, Commune, Distinct, City/Province, Country">
                            <span style="color:red">@error('ownerAddress'){{$message}}@enderror</span>
                        </div>
                    
                    </div>
                </div>
           
            
                <div>
                    <h3>Bank Information</h3>
                </div>
                <div class="col-md-12">
                    <div class="form-row">
                        <!-- <h3 class="pb-3">Primary-Owner</h3> -->
                        
                            <div class="form-group col-md-4">
                                <label for="inputBankName" class="input__label">Bank Name</label>
                                <input type="text" class="form-control input-style" id="inputBankName"
                                    name="bankName"
                                    value="{{old('bankName')}}"
                                    placeholder="Bank Name">
                                    <span style="color:red">@error('bankName'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputBankAccountName" class="input__label">Bank Account Name</label>
                                <input type="text" class="form-control input-style" id="inputBankAccountName"
                                    name="bankAccountName"
                                    value="{{old('bankAccountName')}}"
                                    placeholder="Bank Account Name">
                                <span style="color:red">@error('bankAccountName'){{$message}}@enderror</span>
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label for="inputBankAccountNumber" class="input__label">Bank Account Number</label>
                                <input type="text" class="form-control input-style" id="inputBankAccountName"
                                    name="bankAccountNumber"
                                    value="{{old('bankAccountNumber')}}"
                                    placeholder="Bank Account Number">
                                <span style="color:red">@error('bankAccountName'){{$message}}@enderror</span>
                            </div>
                        
                    </div>    
              
                </div>
            <!-- //forms 2 -->

           

            <!-- forms 1 -->
            <div>
                    <h3>Period of Agreement<span></span></h3>
            </div>
            <div class="col-md-12">    
                <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputContractNo" class="input__label">Contract No</label>
                                <input type="text" class="form-control input-style" id="inputContractNo"
                                     value="{{old('contractNumber')}}" name="contractNumber" placeholder="Contract No">
                                     <span style="color:red">@error('contractNumber'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-2">
                               <label for="datetimepicker" class="input__label">Start Date</label>
                                <div class='input-group date' id='datetimepicker'>
                                    <input type='date' class="form-control input-style"
                                    name="startDate"
                                    value="{{old('startDate')}}" /> 
                                   
                                </div>
                                <span style="color:red">@error('startDate'){{$message}}@enderror</span>
                            </div>

                      
                            <div class="form-group col-md-2">
                               <label for="datetimepicker2" class="input__label">End Date</label>
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='date' class="form-control input-style"
                                    name="endDate"
                                    value="{{old('endDate')}}" /> 
                                    
                                </div>
                                <span style="color:red">@error('endDate'){{$message}}@enderror</span>
                            </div>

                        
                            <div class="form-group col-md-2">
                                    <label for="inputNumberYear" class="input__label">Number of Year</label>
                                    <input type="text" class="form-control input-style" id="inputNumberYear"
                                        name="noYear"
                                        value="{{old('noYear')}}"
                                        placeholder="Number of Year">
                                    <span style="color:red">@error('noYear'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-2">
                                    <label for="inputNetFree" class="input__label">Net Fee($)</label>
                                
                                        <input type="number" class="form-control input-style" id="inputNetFee"
                                        placeholder="Net Fee" min="0"
                                        name="netFee"
                                        value="{{old('netFee')}}"
                                        >
                                        <span style="color:red">@error('netFee'){{$message}}@enderror</span>
                                    
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputPmtMethod" class="input__label">Pmt Method</label>
                                <select id="inputPmtMethod" class="form-control input-style"
                                    name="pmtMethod"
                                    value="{{old('pmtMethod')}}">
                                    <option selected value="1">Monthly</option>
                                    <option value="3">Quarterly</option>
                                    <option value="6">Semesterly</option>
                                    <option value="12">Yearly</option>   
                                </select>
                                <span style="color:red">@error('status'){{$message}}@enderror</span>
                            </div>
                          
                           
                            <!-- <div class="form-group col-md-6">
                                <label for="inputPassword4" class="input__label">Password</label>
                                <input type="password" class="form-control input-style" id="inputPassword4"
                                    placeholder="Password">
                            </div> -->
                        
                            <div class="form-group col-md-12">
                                <label for="inputDueDate" class="input__label">Due Date</label>
                                <input type="text" class="form-control input-style" id="inputDueDate"
                                        name="dueDate"
                                        value="{{old('dueDate')}}"
                                    placeholder="Due Date">
                                <span style="color:red">@error('dueDate'){{$message}}@enderror</span>
                            </div> 
                </div>
                <div class="form-group col-md-12">
                                <label for="inputRemark" class="input__label">Remark</label>
                                <input type="text" class="form-control input-style" id="inputRemark"
                                    name="remark"
                                    value="{{old('remark')}}"
                                    placeholder="Remark">
                                <span style="color:red">@error('remark'){{$message}}@enderror</span>
                </div> 
                <div class="form-group row">
                    <div class="col-md-9">
                        
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-success btn-style" style="width:70px">Save</button>
                    </div>
                    <div class="col-md-1">
                        <a type="submit" href="{{ route('site-rental.Index') }}" style="width:70px" class="btn btn-danger btn-style btn-border">Cancel</a>
                    </div>
                
                </div>
            </div>
           
                        
            
            <!-- //forms 1 -->
    
            
     

        </section>
        <!-- //forms -->
        </section>
        <!-- //forms  -->
    </form>   
    </div>
    <!-- //content -->
    </div>
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