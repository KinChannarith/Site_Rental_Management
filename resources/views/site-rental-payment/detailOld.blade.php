<!-- include "Models/Site.php"; -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php
use App\Models\Helpers;
// if data 'search' posted in POST method, make it safe in HTML then store it in $search. If 'search' data was not posted, fill it with an empty string ('')
$search = (isset($_GET['search'])) ? htmlentities($_GET['search']) : '';
$filter = (isset($_GET['filter'])) ? htmlentities($_GET['filter']) : '';
$startDateFrom = (isset($_GET['startDateFrom'])) ? htmlentities($_GET['startDateFrom']) : '';
$endDateFrom = (isset($_GET['endDateFrom'])) ? htmlentities($_GET['endDateFrom']) : '';
$startDateTo = (isset($_GET['startDateTo'])) ? htmlentities($_GET['startDateTo']) : '';
$endDateTo = (isset($_GET['endDateTo'])) ? htmlentities($_GET['endDateTo']) : '';
$status = (isset($_GET['status'])) ? htmlentities($_GET['status']) : '';
$newID = (isset($_GET['newID'])) ? htmlentities($_GET['newID']) : '';
$oldID = (isset($_GET['oldID'])) ? htmlentities($_GET['oldID']) : '';
$startDate = (isset($_GET['startDate'])) ? htmlentities($_GET['startDate']) : '';
$endDate = (isset($_GET['endDate'])) ? htmlentities($_GET['endDate']) : '';
$constructionDate = (isset($_GET['constructionDate'])) ? htmlentities($_GET['constructionDate']) : '';
$changeDate = (isset($_GET['changeDate'])) ? htmlentities($_GET['changeDate']) : '';
$netFee = (isset($_GET['netFee'])) ? htmlentities($_GET['netFee']) : '';
$RFAIDate = (isset($_GET['RFAIDate'])) ? htmlentities($_GET['RFAIDate']) : '';
?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{csrf_token()}}" > 
  <script>window.Laravel = {csrfToken: '{{ csrf_token()}}'}</script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> -->
  <!-- <link rel="stylesheet" href="{{asset('assets/DataTables/datatables.css') }}"> -->
  <!-- <link rel="stylesheet" href="assets/dataTables/datatables.min.css"> -->
  <link  href="{{ asset('assets/css/bootstrap.css') }}" type="text/css" rel="stylesheet" media="all">
<link href="{{ asset('assets/css/style.css') }}" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" href="{{ asset('assets/css/prettySticky.css') }}" type="text/css">
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
<div class="container-fluid content-top-gap">
<section data-navlink="Link1">

<section class="forms">
<!-- main content start -->
  <div class="main-content">
      <!-- content -->
      <div class="card card_border py-2 mb-4">
          <div class="cards__heading">
             <articles></articles>
              <!-- <h3><b>Site Rental List</b><span></span></h3> -->
              
              <br/>
              @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                            <p>{{ $message }}</p>
                            </div>
              @endif
              <div>
                
                <!-- <form action="{{route('site-rental.Search')}}" method="GET">
                
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
                     
              
                
                
              </form> -->
              <div class="row">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                  <div style="margin-left: 60px;">
                  <a class='btn btn-primary' href="{{ route('site-rental.Create') }}" type='submit' value='submit'>Export to Excel</a>

                  </div>
                </div>
              </div>
              
              <div class="table-responsive">
                  
                      <thead>
                      </thread>                      
                      <div class="row">          
                      <table id="example" class="table table-striped table-bordered table-hover" style="table-layout:fixed;" cellspacing="0" >
                      <thead>
                          <tr>
                            <th width="200" colspan=2>Site ID</th>
                            <th  width="260" colspan=2>Contract period</th>
                            <th  width="130" rowspan=2>Contract No.</th>
                            <th width="160" rowspan=2>Payment term</th>
                            <th width="180" rowspan=2>Site owner</th>
                            <th width="180" rowspan=2>Vendor name</th>
                            <th width="180" rowspan=2>VATTIN</th>
                            <th width="200" rowspan=2>Location</th>
                            <th width="130" rowspan=2>Construction date</th>
                            <th width="120" rowspan=2>Site status</th>
                            <th width="130" rowspan=2>Status change date</th>
                            <th width="100" rowspan=2>Rental fee</th>
                            <th width="130" rowspan=2>Adjust RFAI date</th>
                            <th width="100" rowspan=2>Tenant</th>
                            <th width="100" rowspan=2>Additional charge fee</th>
                            <th width="100" rowspan=2>Additional service</th>
                          </tr>
                          <tr>
                            <th >New ID</th>
                            <th>Old ID</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            
                          </tr>
                          <tr>
                            <th >
                            
                            <div>
                            <input type="text" style="margin-bottom:15px" class="form-control  input-style" id="inputnewID"
                                    name="newID"
                                    value="<?= $newID ?>"
                                   >  
                            </div>
                            
                            </th>
                            <th>
                             <div>
                              <input type="text" style="margin-bottom:15px" class="form-control input-style" id="inputoldID"
                                    name="oldID"
                                    value="<?= $oldID ?>"
                                    >  
                             </div>
                            </th>
                            <th>
                                       <div style="margin-bottom:15px">
                                       <input type='text' class="form-control input-style"
                                        name="startDate"
                                        value="<?= $startDate ?>" /> 
                                       </div>
                                      
                            </th>
                            <th>
                                       <div style="margin-bottom:15px">
                                       <input type='text' class="form-control input-style"
                                        name="endDate"
                                        value="<?= $endDate ?>" /> 
                                       </div>
                                     
                            </th>
                            <th></th>
                            <th>
                            
                              <div class="form-group" >
                                    
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
                            </th>
                            <th></th>
                            <th></th>
                            <th>
                            
                              <div class="form-group" >
                                    
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
                            </th>
                            <th></th>
                            <th>
                                       <div style="margin-bottom:15px">
                                       <input type='text' class="form-control input-style"
                                        name="constructionDate"
                                        value="<?= $constructionDate ?>" /> 
                                       </div>
                                      
                            </th>
                            <th>
                            
                              <div class="form-group" >
                                    
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
                            </th>
                            <th>
                                       <div style="margin-bottom:15px">
                                       <input type='text' class="form-control input-style"
                                        name="changeDate"
                                        value="<?= $changeDate ?>" /> 
                                       </div>
                                     
                            </th>
                            <th>
                                       <div style="margin-bottom:15px">
                                       <input type='text' class="form-control input-style"
                                        name="netFee"
                                        value="<?= $netFee ?>" /> 
                                       </div>
                                     
                            </th>
                            <th>
                                       <div style="margin-bottom:15px">
                                       <input type='text' class="form-control input-style"
                                        name="RFAIDate"
                                        value="<?= $RFAIDate ?>" /> 
                                       </div>
                                     
                            </th>
                            <th></th>
                            <th>
                        
                            </th>
                            <th></th>
                        
                          </tr>
                        </thead>
                        
                        <tbody>
                          @foreach($sites as $site)
                         
                          <tr>
                           <td>{{$site->newID}}</td>
                           <td>{{$site->oldID}}</td>
                           <td>{{$site->dateFormat($site->startDate,'d-m-Y')}}</td>
                           <td>{{$site->dateFormat($site->endDate,'d-m-Y')}}</td>
                           <td>{{$site->contractNumber}}</td>
                           <td>{{Helpers::paymentTerm($site->pmtMethod)}}</td>
                           <td>{{$site->siteOwner}}</td>
                           <td>{{$site->fullname}}</td>
                           <td></td>
                           <td>{{$site->stringCut($site->address,20)}}</td>
                           <td>{{Helpers::dateFormat($site->constructionDate,'d-m-Y')}}</td>
                           
                           <td>{{$site->status}}</td>
                           <td></td>
                           <td>{{$site->netFee}}</td>
                           <td>{{Helpers::dateFormat($site->RFAIDate,'d-m-Y')}}</td>
                           <td>{{$site->tenant}}</td>
                           <td>{{$site->additionalFee}}</td>
                           <td>{{$site->additionalServices}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                   
              </div>
            </div>
                  
              
        </div>
      </div>
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
<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
  <!-- <script type="text/javascript" src="assets/dataTables/datatables.min.js">
    $(document).ready( function () {
    $('#dataTables').DataTable();
    } );
  </script> -->
  <script src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script> 
  <script src="{{ asset('js/app.js')}}"></script> 
<script type="text/javascript">
			$(function(){
				$('.active').removeClass('active');
				$('#Link1').addClass('active');

       
			});
			
	</script>

</html>

