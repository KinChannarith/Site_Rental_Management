<form action="" method="post" enctype="multi/form-data">

<div class="modal fade" id="vendorModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
          <div>
            <br/> <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label for="" class="pb-2">Vendor name</label>
                    <input type='text' class="form-control input-style"
                      name="vender_name"
                      /> 
                      <div class="pb-4"></div>
                      <div class="pb-4"></div>

                      <label for="" class="pb-2">VATTIN</label>
                    <input type='text' class="form-control input-style"
                      name="vattin"
                      /> 
                      <div class="pb-4"></div>
                      <div class="pb-4"></div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:130px">Cancel</button>
        <button type="button" class="btn btn-primary" style="width:130px">Confirm</button>
      </div>
    </div>
  </div>
</div>


</form>