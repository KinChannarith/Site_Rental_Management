<form action="" method="post" enctype="multi/form-data">
<div class="modal fade" id="smartModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        <table class="table table-hover table-strip table-bordered">
            <thead>
               <tr>
                   <th>Vendor name</th>
                   <th>VATTIN</th>
                   <th>SAP voucher number</th>
               </tr>
            </thead>
            <tbody>
                <tr>
                   <td></td>
                   <td>N/A</td>
                   <td>
                       <div>
                                       <input type='text' class="form-control input-style"
                                        name="N/A"
                                        value="{{old('N/A')}}" /> 
                        </div>
                    </td>
               </tr>
               <tr>
                   <td>Telecom Cambodia (TC)</td>
                   <td>L001-100062395</td>
                   <td>
                        <div>
                                       <input type='text' class="form-control input-style"
                                        name="TC"
                                        value="{{old('TC')}}" /> 
                        </div>
                   </td>
               </tr>
               <tr>
                    <td>MSA Marketing Solutions Asia Ltd</td>
                    <td>L001-100076891</td>
                    <td>
                        <div>
                                       <input type='text' class="form-control input-style"
                                        name="MSA"
                                        value="{{old('MSA')}}" /> 
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Cambodia Business Solution Ltd</td>
                    <td>L001-100076892</td>
                    <td>
                        <div>
                                       <input type='text' class="form-control input-style"
                                        name="CBS"
                                        value="{{old('CBS')}}" /> 
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Smart Solution for Cambodia Ltd</td>
                    <td>L001-100076899</td>
                    <td>
                        <div>
                                       <input type='text' class="form-control input-style"
                                        name="SSC"
                                        value="{{old('SSC')}}" /> 
                        </div>
                    </td>
               </tr>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:130px">Cancel</button>
        <button type="button" class="btn btn-primary" style="width:130px">Confirm</button>
      </div>
    </div>
  </div>
</div>


</form>