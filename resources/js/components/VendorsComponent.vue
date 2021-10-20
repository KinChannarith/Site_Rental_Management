<template>
<div>
    <title>Vendor-List</title>
<div class="container-fluid">
  <h3><b>Vendors</b></h3>
  <br>
   <div class="row">
      <div class="form-group col-md-2" >
          <label for="inputVendorName" class="input__label">Vendor name</label>
              <input type="search" v-model="SVendorName" class="form-control input-style">
              
      </div>
      <div class="form-group col-md-2">
         <label for="inputVendorName" class="input__label">Vattin</label>
               <input type="search" v-model="SVattin" class="form-control input-style">
              
      </div>
      <div class="form-group col-md-2">
      <br/>
        <button type="submit" class="btn btn-danger btn-style btn-border" style="width:100px" @click="reset">Reset</button>
      </div>
    </div>
    
     
          
  <a class='btn btn-primary icons'  type='submit' value='submit' data-toggle="modal" data-target="#vendorModalCenter" @click="createVendor()" onclick="setCreate()">add</a>    
  <div class="table-responsive">  
  <table id="tbSites" class="table table-bordered table-striped table-hover" width="100%" style="table-layout:fixed;">
    <thead>
      <tr>
        <th width="40%">Vendor Name</th>
        <th width="30%">VATTIN</th>
        <th width="30%"></th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="vendor in vendors.data" :key="vendor.ID">
        <td>{{vendor.vendor_name}}</td>
        <td>{{vendor.vattin}}</td>
        <td>
          <a class="btn btn-danger edit" type="submit" id="edit" data-toggle="modal" data-target="#vendorModalCenter"  style="width:120px" data-idUpdate="'$vendor->id'"  @click="editVendor(vendor)">Edit</a>
        <!-- <a class="btn btn-primary delete" type="submit" id="delete" data-toggle="modal" data-target="#deleteModalCenter"   @click="deleteModal(vendor)">Delete</a>-->
        </td> 
       
      </tr>
    </tbody>
  </table>
  
  </div>
 <div class="row mt-4">
      <div class="col-md-10">

      </div>
      <div class="col-md-2">
        <div class="col-sm-12 offset-5 " style="margin-left: 60px;">
          <pagination :data="vendors" @pagination-change-page="getVendors" @limit=1>

          </pagination>
        </div>
      </div>
  </div> 
  

    
</div>

    <div  class="modal fade" id="vendorModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" role="document">
           
            <div class="modal-content">
            <form @submit.prevent="submitVendor" class="mb-3" enctype="multipart/form-data" >
              
               
                    <div class="modal-body">
                      
                                            <div>
                                              <br/> <input type="hidden" name="id" v-model="vendor.id" >
                                                      <label for="" class="pb-2">Vendor name</label>
                                                      <input type='text' class="form-control input-style"
                                                        v-model="vendor.vendor_name" name="vendor_name"
                                                        /> 
                                                
                                                        <label for="" class="pb-2">VATTIN</label>
                                                      <input type='text' class="form-control input-style"
                                                        v-model="vendor.vattin" name="vattin"/> 
                                                        <div class="pb-4"></div>
                                                        <div class="pb-4"></div>
                                            </div>
                    </div>
                    <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:130px">Cancel</button>
                              <button type="submit"  class="btn btn-primary" style="width:130px">Confirm</button>
                    </div>
                     
                   </form> 
            </div>
           
        </div>
       
    </div>



    <div  class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
           
            <div class="modal-content">
            <form @submit.prevent="deleteModal" class="mb-3" enctype="multipart/form-data" >
              
               
                    <div class="modal-body">
                        <p>Do you want to delete{{this.vendor.vendor_name}} ?</p>
                                           
                    </div>
                    <div class="modal-footer">
                              <button type="submit"  class="btn btn-danger" @click="remove()" style="width:130px">Yes</button>
                              <button type="button" class="btn btn-primary" data-dismiss="modal" style="width:130px">No</button>
                              
                    </div>
                     
                   </form> 
            </div>
           
        </div>
       
    </div>

</div>



</template>

<script>

export default {
  data(){
    return{
      isCreate:true,
      vendors: {},
      vendor: {
        id: null,
        vendor_name: null,
        vattin: null,
        
      },
      modalShow: true,
      checked:[],
      paginate: 5,
      SVendorName:"",
      SVattin:"",
      url:'',
      SStatus:'',
      getVendorsWithoutPaginate:"",
      getVendorsUrl:"",
      vendor_id:null,
      
    }
  },
  watch:{
    paginate:function(){
      this.getVendors();
    },
    SVendorName:function(){
      this.getVendors();
    },
    SVattin:function(){
      this.getVendors();
    },
    
  },
  methods:{
    reset(){
      
      this.SVendorName='';
      this.SVattin='';
    },
      setCreate(){
        this.isCreate=true;
      },
      createVendor(){
         
        this.vendor.id = null;
        this.vendor_id = null;
        this.vendor.vendor_name = null;
        this.vendor.vattin = null;
      },
      editVendor(vendor){
        
        
        this.vendor.id = vendor.id;
        this.vendor_id = vendor.id;
        this.vendor.vendor_name = vendor.vendor_name;
        this.vendor.vattin = vendor.vattin;
      },
      getVendors(page = 1){
        this.getVendorsWithoutPaginate ='/api/vendors?SVendorName='+this.SVendorName
        +'&SVattin='+this.SVattin 
        
      this.getVendorsUrl = this.getVendorsWithoutPaginate.concat(
                 "&paginate=" + this.paginate +"&page=" + page
            );
        axios.get(
          this.getVendorsUrl
        )
        .then(response=>{
          this.vendors =response.data;
          console.log(this.vendors);
              
        }),
        axios.get(this.getVendorsWithoutPaginate).then(response => {
                // console.log(response.data);
                this.checked = [];
                response.data.data.forEach(vendor => {
                    this.checked.push(vendor.id);
                });
                this.url="/site-rental-payment/export/"+this.checked;
          });
        
        //this.url='site-rental-payment/export/'+this.checked;
      },
      // exportAll(){
       submitVendor(){
         if(this.vendor_id === null){
                    axios.post('/api/vendor-list/vendors/', this.vendor).then(res=>{
                        console.log("res from api", res.data)
                        this.vendor.vendor_name = null,
                        this.vendor.vattin = null,
                        this.getVendors()
                         this.vendor_id=null;
                        this.modalShow = false;
                         $('#vendorModalCenter').modal('hide');
                        $(".modal-backdrop").remove();
                        $(".modal-backdrop").addClass();
                    }).catch(err=>{
                        console.log("error ", err.response)
          })
      }
      else{
         axios.put('/api/vendor-list/vendors/'+this.vendor_id,this.vendor)
        .then(res=>{
          console.log("res ", res.data);
          this.getVendors();
          this.vendor_id=null;
          // this.modalShow = false;
          $('#vendorModalCenter').modal('hide');
          $(".modal-backdrop").remove();
          $(".modal-backdrop").addClass();
          // $('#vendorModalCenter').on('hidden.bs.modal', function () {
          //     _this.render();
          // })
        }).catch(err=>{
          console.log("error",err.response)
        })
        }
      },
       
      remove(){
                axios.delete('/api/vendor-list/vendors/'+this.vendor_id).then(res=>{
                    console.log('deleted', res.data)
                    this.getVendors();
                     this.vendor_id=null;
                      $('#deleteModalCenter').modal('hide');
                       $(".modal-backdrop").remove();
                       $(".modal-backdrop").addClass();
                }).catch(err=>{
                    console.log("error ", err.response)
                })
            },
      deleteModal(vendor){
          this.vendor_id=vendor.id;
          this.vendor.vendor_name=vendor.vendor_name;
      }
                
      //           //this.selectAll = true;
      // },
  },
  mounted(){
    this.getVendors();
  }
};
$(document).ready(function () {
$('#tbSites').DataTable({
"scrollX": true
});
$('.dataTables_length').addClass('bs-select');
});
</script>
