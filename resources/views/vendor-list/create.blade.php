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

  <title>Vendor-New</title>

  <!-- Template CSS -->
  

  <!-- google fonts -->
  
</head>

<body class="sidebar-menu-collapsed">
<div class="se-pre-con"></div>
<section>
  
<!-- main content start -->
<div class="main-content">
    <form action="{{ url('/vendor-list/store')}}" method="post">
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
                    <h3>Vendor Information<span></span></h3>
                </div>
                <div class="col-md-12">
                    
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputSiteID" class="input__label">Vendor Name</label>
                                <input type="text" class="form-control input-style" name="vendor_name"
                                    value="{{old('vendor_name')}}"
                                    placeholder="Vendor Name">
                                </input>
                                <span style="color:red">@error('vendor_name'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputOldID" class="input__label">VATTIN</label>
                                <input type="text" class="form-control input-style" id="inputOldID"
                                    name="vattin"
                                    value="{{old('vattin')}}"
                                    placeholder="vattin">
                                    <span style="color:red">@error('vattin'){{$message}}@enderror</span>
                            </div>
                            
                    </div>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-success btn-style" style="width:70px">Save</button>
                    </div>
                    <div class="col-md-1">
                        <a type="submit" href="{{ route('vendor-list.Index') }}" style="width:70px" class="btn btn-danger btn-style btn-border">Cancel</a>
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