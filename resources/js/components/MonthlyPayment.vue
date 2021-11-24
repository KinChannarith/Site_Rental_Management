<template>
<div>
        <div class="main-content">
            <div class="py-2 mb-4">
                <div class="cards__heading">
                    <h3>Monthly Payment List<span></span></h3>
                </div>  
                <br/>
             
                <div>
                    <div class="row">
                        <section class="col-md-2">
                            <div class="form-group">
                               <label for="datetimepicker" class="input__label">Pay Date from</label>
                                <div class='input-group date' >
                                    <input type='date' id='datetimepicker' class="form-control input-style"
                                    name="startDateFrom"  v-model="SPayDateFrom"
                                    /> 
                                   
                                </div>
                                
                            </div>

                        </section>
                        <section class="form-group col-md-2">
                            <div class="form-group">
                               <label for="datetimepicker2" class="input__label">To</label>
                                <div class='input-group date' >
                                    <input type='date' id='datetimepicker2' class="form-control input-style"
                                    name="startDateTo" min="2021-01-01" max="2050-01-01" v-model="SPayDateTo"
                                     /> 
                                    
                                </div>
                                
                            </div>
                        </section>
                        <section>
                            <div class="form-group col-md-2">
                               <label for="datetimepicker3" class="input__label">Pay Month/Year</label>
                                <div class='input-group date'>
                                    <input type='date' class="form-control input-style"
                                    name="payMonth"  id="datetimepicker3" v-model="SPayMonth" @blur="FOSPayMonth"
                                   /> 
                                   
                                </div>
                               
                            </div>
                        </section>
                        <div class="form-group col-md-2">
                            <label for="inputStatus" class="input__label">Status</label>
                                <select v-model="SStatus" class="form-control input-style">
                                    <option value=""></option>
                                    <option v-for="item in statuses" :value="item">
                                        {{item}}
                                    </option>

                                  </select>
                                
                        </div>
                        
                        <div class="form-group col-md-2">
                            <label for="inputStatus" class="input__label">Site ID</label>
                            <input type="text" class="form-control input-style" id="inputSearch"
                                name="SNewID"  v-model="SNewID"
                                
                                placeholder="Site ID">                              
                        </div>  
                        <div class="form-group col-md-2">
                              <br/>
                             <a class="btn btn-primary icons" type="submit" id="search"   @click="search()">search</a>
                              <a   
                              :href="url" class='btn btn-primary' style="margin-left: 70px;" value='submit' type='submit'>Export to Excel</a>
                        </div> 
                       
                    </div>
                
                   
            </div>
              
               <a class='btn btn-primary' style="width:190px" id="updatePayment" type='submit' @click="createPayment()" value='submit' data-toggle="modal" data-target="#smartModalCenter">Update payment status</a>
                
                          <!-- <a class='btn btn-primary' href="{{ route('site-rental.Create') }}" type='submit' value='submit'>Export to Excel</a> -->
                           

                                         
              <div class="table-responsive" style="height:370px;width:auto;">
                                   
                      <div class="row">          
                      <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="80%">
                        <thead>
                          <tr>
                            <th width="10%">Actions</th>
                            <th width="10%">New ID</th>
                            <th width="10%">Status</th>
                            <th width="10%">Pay Month</th>
                            <th width="10%">Pay Date</th>
                            <th width="8%">Net Fee</th>
                            <th width="10%">Description</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                         
                          <tr v-for="mp in monthlyPayments.data" :key="mp.ID">
                          <td><a class='btn btn-primary icons'  id="viewPayment" type='submit' @click="viewPayment(mp)" value='submit' data-toggle="modal" data-target="#smartModalCenter">visibility</a>
                          <a class='btn btn-secondary icons'  id="editPayment" type='submit' @click="editPayment(mp)" value='submit' data-toggle="modal" data-target="#smartModalCenter">edit</a>
                           <a class="btn btn-danger icons" type="submit" id="delete" data-toggle="modal" data-target="#deleteModalCenter"   @click="deleteModal(mp)">delete</a>
                          </td>
                           <td>{{mp.newID}}</td>
                           <td>{{mp.status}}</td>
                           <td>{{mp.payMonth}}</td>
                           <td>{{mp.payDate}}</td>
                           <td>{{mp.netFee}}</td>
                           <td>{{mp.description}}</td>
                           
                          </tr>
                          
                        </tbody>
                    </table>
                    <div class="container">
                      <div class="row">
                            <div class="col-10">
                              <p></p>
                            </div>
                        
                            <div class="col-2">
                               
                            </div>
                      </div>
                    </div>
              </div>
            </div>    
        </div>
    </div>

<div  class="modal fade" id="smartModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <br>
   <br>
   <br>

  <form @submit.prevent="submitPayment" class="mb-3" enctype="multipart/form-data" >
  <div class="modal-dialog modal-dialog-centered" role="document"  >
    <div class="modal-content modal-dialog-centered" >
      <div class="modal-header" >
        <h3 class="modal-title" id="exampleModalLongTitle"><b>Update Payment</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body ">    

          <div class="row">
              <div class="form-group col-md-4">
                <label for="inputNewSiteID" class="input__label" id="NewSiteID">New Site ID</label>
                <input type="text" class="form-control input-style" name="newID" id="inputNewSiteID"
                                 v-model="monthlyPayment.newID"   placeholder="New Site ID" @blur="testNewSite" :disabled="monthlyPayment_id != null"  >
              </div>
              
              <div class="form-group col-md-4">
                   <label for="datetimepicker" class="input__label">Payment Month</label>
                                    <div class='input-group date' >
                                        <input type='date' name="paymonth" v-model="monthlyPayment.payMonth"  @blur="FOPayMonth" id='datetimepickerPayMonth' :disabled="isView != null" class="form-control input-style" /> 
                                        
                                    </div>
                                   
              </div>
                <div class="form-group col-md-4">
                               <label for="datetimepicker2" class="input__label">Pay Date</label>
                                <div class='input-group date'  >
                                    <input type='date'  id='datetimepicker2' class="form-control input-style" :disabled="isView != null"
                                    v-model="monthlyPayment.payDate" name="paydate" /> 
                                    
                                </div>
                               
                </div>

                            
                        
                          
            </div>
            <div class="row">
                        <div class="form-group col-md-2">
                        <label for="inputNetFee" class="input__label">Net Fee</label>
                            <input type="number" name="netFee" v-model="monthlyPayment.netFee" class="form-control input-style" id="inputNetFee"
                                            placeholder="Net Fee"  readonly>
                                
                        </div>
                        <div class="form-group col-md-2">
                                <label for="inputDescription" class="input__label">Site Owner</label>
                                <input type="text" name="siteOwner"  v-model="monthlyPayment.siteOwner" class="form-control input-style" id="inputSiteOwner"
                                    placeholder="site owner" readonly>
                                   
                        </div>
                         <div class="form-group col-md-2">
                                <label for="inputStatus" class="input__label">status</label>
                                <input type="text" name="status"  v-model="monthlyPayment.status" class="form-control input-style" id="inputStatus"
                                    placeholder="site owner" readonly>
                                   
                        </div>   
                        <div class="form-group col-md-6">
                                <label for="inputDescription" class="input__label">Description</label>
                                <input type="text" name="description" v-model="monthlyPayment.description" class="form-control input-style" id="inputDescription"
                                    placeholder="Description" :disabled="isView != null">
                                   
                        </div>
            </div>
        <table class="table table-hover table-strip table-bordered" >
            <thead>
               <tr>
                   <th>Vendor name</th>
                   <th>VATTIN</th>
                   <th>SAP voucher number</th>
               </tr>
            </thead>
            <tbody>
                <tr v-for="vendor in vendors.data" :key="vendor.id">
                   <td> <input type='text' class="form-control input-style" :disabled="monthlyPayment_id != null"
                                        v-model="vendor.vendor_name"/> </td>
                   <td> <input type='text' class="form-control input-style" :disabled="monthlyPayment_id != null"
                                        v-model="vendor.vattin"/> </td>
                   <td>
                       <div>
                                       <input type='text' class="form-control input-style" :disabled="isView != null"
                                        v-model="vendor.voucher"/> 
                        </div>
                    </td>
                    <td>
                        
                    </td>
                    
               </tr>
              
            </tbody>
        </table>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:130px">Cancel</button>
        <button type="submit" class="btn btn-primary" :visible="isView == null" style="width:130px">Confirm</button>
      </div>
    </div>
  </div>
  </form>
  </div>
  <div  class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
           
            <div class="modal-content">
            <form @submit.prevent="deleteModal" class="mb-3" enctype="multipart/form-data" >
              
               
                    <div class="modal-body">
                        <p>Do you want to delete ?</p>
                                           
                    </div>
                    <div class="modal-footer">
                              <button type="submit"  class="btn btn-danger"  @click="remove()" style="width:130px" >Yes</button>
                              <button type="button" class="btn btn-primary" data-dismiss="modal" style="width:130px">No</button>
                              
                    </div>
                     
                   </form> 
            </div>
           
        </div>
       
    </div>
  <div class="row mt-4">
      <div class="col-md-10">

      </div>
      <div class="col-md-2">
        <div class="col-sm-12 offset-5 " style="margin-left: 60px;">
          <pagination :data="monthlyPayments" @pagination-change-page="getMonthlyPayments">

          </pagination>
        </div>
      </div>
  </div>


</div>
</template>
<script>
export default {
  data(){
    return{
      checked:[],
              vendors:{
                data:[

                ]
                  
                
              },
              sites: {
                  id:'',
                  length: 0,
                  newID: '',
                  netFee: '',
                  siteOwner: '',
                  status:'',
              },
              monthlyPayment: {
                id:null,
                newID: null,
                payMonth: null,
                payDate: null,
                description: null,
                siteID: null,
                siteOwner: '',
                netFee:'',
                status:'',
                vendors:{}
              },
              monthlyPayment_duplicate: {
                id:null,
                newID: null,
                payMonth: null,
                payDate: null,
                description: null,
                siteID: null,
                siteOwner: null,
                netFee:null,
                status:null
              },
              monthlyPayments:{},
              monthlyPayment_id: null,
              siteID:'',
              SNewID: '',
              payMonth: "",
              payDate:"",
              netFee: '',
              siteOwner:'',
              getSitesUrl:'',
              description:'',
              getSitesWithoutPaginate:'',
              getMonthlyPaymentsWithoutPaginate:'',
              getMonthlyPaymentsUrl:'',
              paginate: 5,
              isView: null,
              statuses : null,
              SStatus:'',
              SPayMonth: '',
              SPayDateFrom:'',
              SPayDateTo:'',
              url:'',
              url_check:''
          }
          
        },
        methods: {

          FOPayMonth(e){
            if(this.monthlyPayment.payMonth!='')
            {
              var payMonth = new Date(this.monthlyPayment.payMonth);
              var year= payMonth.getFullYear();
              var month = (payMonth.getMonth() < 9 ? '0' : '') + (payMonth.getMonth()+1);
              this.monthlyPayment.payMonth = year+"-"+month+"-01";


               this.monthlyPayment_duplicate={};
              this.url_check='/api/monthlyPayments?SNewID='+ this.monthlyPayment.newID
              +'&SPayMonth='+this.monthlyPayment.payMonth
             
              axios.get(
                this.url_check
              )
              .then(response=>{
                this.monthlyPayment_duplicate =response.data;
                console.log(this.monthlyPayment_duplicate);
                if(this.monthlyPayment_duplicate.data.length>0 && this.monthlyPayment_id!=this.monthlyPayment_duplicate.data[0].id)
                  {
                    alert("Pay month and site ID is existed in the system");
                    
                  }
              })
             
            }
            
          },
          FOSPayMonth(e){
            if(this.SPayMonth!='')
            {
              var payMonth = new Date(this.SPayMonth);
              var year= payMonth.getFullYear();
              var month = (payMonth.getMonth() < 9 ? '0' : '') + (payMonth.getMonth()+1);
              this.SPayMonth = year+"-"+month+"-01";

              
            }
          },
            testNewSite(e) {
                  
                  this.getSitesWithoutPaginate ='/api/sites?SNewID='+this.monthlyPayment.newID+"&monthlyPayment=1";
                  // this.getSitesUrl = this.getSitesWithoutPaginate.concat(
                  //      "&paginate=" + this.paginate +"&page=" + page
                  // );
                
                  axios.get(
                  this.getSitesWithoutPaginate
                  )
                  .then(response=>{
                  this.sites =response.data;
                  console.log(this.sites);
                  if(this.sites.data.length>0)
                  {  this.vendors.data=[];
                      this.monthlyPayment.newID = this.sites.data[0].newID;
                      this.monthlyPayment.netFee=this.sites.data[0].netFee;
                      this.monthlyPayment.siteOwner=this.sites.data[0].siteOwner;
                      this.monthlyPayment.siteID = this.sites.data[0].id;
                      this.monthlyPayment.status= this.sites.data[0].status;
                      this.monthlyPayment.payMonth = this.payMonth;
                      console.log(this.monthlyPayment);
                      if(this.monthlyPayment.siteOwner=="Smart Axiata")
                      {
                         
                          axios.get('/api/vendors').then(response=>{
                          this.vendors = response.data;
                          console.log(this.vendors);
                          
                        })
                      }
                      else{
                         //this.vendors.data= {data:{0:{"vendor_name":"","vattin": ""}}
                         
                          this.vendors.data.push({0:{"vendor_name":"","vattin": "" , "voucher": ""}});
                          console.log(this.vendors);
                          
                      }
                      // this.monthlyPayment.newID = this.SNewID;

                  }
                  else
                  {
                      alert('Site ID is not existed!');
                      this.monthlyPayment.newID=null;
                      this.vendors.data={};
                  }
                  });
  
          },
          checkDuplicate(e){
           

          },
          getMonthlyPayments(page = 1){
             
              this.getMonthlyPaymentsWithoutPaginate ='/api/monthlyPayments?SNewID='+ this.SNewID
              +'&SPayDateFrom='+this.SPayDateFrom +'&SPayDateTo='+this.SPayDateTo+'&SPayMonth='+this.SPayMonth
              +'&SStatus='+this.SStatus
              
              this.getMonthlyPaymentsUrl = this.getMonthlyPaymentsWithoutPaginate.concat(
                      "&paginate=" + this.paginate +"&page=" + page
                  );
              axios.get(
                this.getMonthlyPaymentsUrl
              )
              .then(response=>{
                this.monthlyPayments =response.data;
                console.log(this.monthlyPayments);
                
              }),

              axios.get(this.getMonthlyPaymentsWithoutPaginate).then(response => {
                // console.log(response.data);
                this.checked = [];
                response.data.data.forEach(student => {
                    this.checked.push(student.id);
                });
                
                this.url="/monthly-payment/export/"+this.checked;
               
              });
              
              
              //this.url='site-rental-payment/export/'+this.checked;
            },
          createPayment(){
                  this.monthlyPayment.newID= null,
                  this.monthlyPayment.payMonth = null,
                  this.monthlyPayment.payDate = null,
                  this.monthlyPayment.description = null,
                  this.monthlyPayment.siteID = null,
                  this.monthlyPayment.siteOwner=null,
                  this.monthlyPayment_id=null,
                  this.monthlyPayment.status=null,
                  this.monthlyPayment.netFee=null,
                  this.isView =null;
                  this.vendors.data=[];
                 
                  

          },
          editPayment(mp){
                  
                  this.monthlyPayment.status= mp.status,
                  this.monthlyPayment.newID= mp.newID,
                  this.monthlyPayment.netFee = mp.netFee,
                  this.monthlyPayment.payMonth = mp.payMonth,
                  this.monthlyPayment.payDate = mp.payDate,
                  this.monthlyPayment.description = mp.description,
                  this.monthlyPayment.siteID = mp.siteID,
                  this.monthlyPayment.siteOwner=mp.siteOwner,
                  this.monthlyPayment_id = mp.id,   
                  this.isView =null;
                  this.getVouchersWithoutPaginate ='/api/monthly-payment/monthlyPaymentVouchers?id='+this.monthlyPayment_id;
                  // alert(this.getVouchersWithoutPaginate);
                  axios.get(this.getVouchersWithoutPaginate)
                    .then(res=>{
                      console.log("res ", res.data);
                      this.vendors=res.data;
                  
                  });
                 
                  
          },
          viewPayment(mp)
          {
                  this.monthlyPayment.status= mp.status,
                  this.monthlyPayment.newID= mp.newID,
                  this.monthlyPayment.netFee = mp.netFee,
                  this.monthlyPayment.payMonth = mp.payMonth,
                  this.monthlyPayment.payDate = mp.payDate,
                  this.monthlyPayment.description = mp.description,
                  this.monthlyPayment.siteID = mp.siteID,
                  this.monthlyPayment.siteOwner=mp.siteOwner,
                  this.monthlyPayment_id = mp.id
                  this.isView =1;
                  this.getVouchersWithoutPaginate ='/api/monthly-payment/monthlyPaymentVouchers?id='+this.monthlyPayment_id;
                  axios.get(this.getVouchersWithoutPaginate)
                    .then(res=>{
                      console.log("res ", res.data);
                      this.vendors=res.data;
                  
                  });


          },
          getStatus(){
              axios.get('/api/status')
              .then(res=>{
                console.log("res ", res.data);
                this.statuses=res.data;
              
              });
          },
          submitPayment(){
             
              if(this.monthlyPayment_id === null){  
                if(this.monthlyPayment_duplicate.data.length<=0)
                {                      
                          
                          this.monthlyPayment.vendors=this.vendors.data;
                          // console.log(this.monthlyPayment);
                          axios.post('/monthly-payment/monthlyPayments/', this.monthlyPayment).then(res=>{
                              console.log("res from api", res.data)
                              this.monthlyPayment.newID = null,
                              this.monthlyPayment.payMonth = null,
                              this.monthlyPayment.payDate = null,
                              this.monthlyPayment.description = null,
                              this.monthlyPayment.siteID = null,
                              this.monthlyPayment.siteOwner=null,
                              this.monthlyPayment.status= null
                              
                             for (let i = 0; i < this.vendors.data.length; i++) {
                                axios.post('/monthly-payment/monthlyPaymentVouchers/', this.vendors.data[i]).then(res=>{ 
                                   console.log("above:", res.data)
                                  })
                                  .catch(err=>{
                                    console.log("error", err.response)
                                  });
                              }
                                  
                              
                              this.getMonthlyPayments();
                              this.monthlyPayment_id=null;
                              this.modalShow = false;
                              $('#smartModalCenter').modal('hide');
                              $(".modal-backdrop").remove();
                              $(".modal-backdrop").addClass();
                          }).catch(err=>{
                              console.log("error ", err.response)
                       })
                }
                else
                {
                  alert('payment month and site ID is existed in the system.')
                }
            }
            else{
                
                if(this.monthlyPayment_duplicate.data===undefined || this.monthlyPayment_duplicate.data.length==0)
                {
                  
                   axios.put('/monthly-payment/monthlyPayments/'+this.monthlyPayment_id,this.monthlyPayment)
                  .then(res=>{
                    console.log("res ", res.data);
                    this.getMonthlyPayments();
                    this.monthlyPayment_id=null;
                   
                    for (let i = 0; i < this.vendors.data.length; i++) {
                          axios.put('/api/monthly-payment/monthlyPaymentVouchers/'+this.vendors.data[i].id,this.vendors.data[i]).then(res=>{ 
                            console.log("above:", res.data)
                            })
                            .catch(err=>{
                               console.log("error", err.response)
                      });
                    }
                     this.modalShow = false;
                    $('#smartModalCenter').modal('hide');
                    $(".modal-backdrop").remove();
                    $(".modal-backdrop").addClass();
                    // $('#vendorModalCenter').on('hidden.bs.modal', function () {
                    //     _this.render();
                    // })
                  }).catch(err=>{
                    console.log("error",err.response)
                  })
                }
                else 
                  if(this.monthlyPayment_duplicate.data[0].id==this.monthlyPayment_id)
                  {
                    
                    axios.put('/monthly-payment/monthlyPayments/'+this.monthlyPayment_id,this.monthlyPayment)
                    .then(res=>{
                    console.log("res ", res.data);
                    
                    this.getMonthlyPayments();
                    this.monthlyPayment_id=null;
                    
                    for (let i = 0; i < this.vendors.data.length; i++) {
                         axios.put('/api/monthly-payment/monthlyPaymentVouchers/'+this.vendors.data[i].id,this.vendors.data[i]).then(res=>{ 
                            console.log("above:", res.data)
                            })
                            .catch(err=>{
                               console.log("error", err.response)
                      });
                    }
                     this.modalShow = false;
                    $('#smartModalCenter').modal('hide');
                    $(".modal-backdrop").remove();
                    $(".modal-backdrop").addClass();
                    // $('#vendorModalCenter').on('hidden.bs.modal', function () {
                    //     _this.render();
                    // })
                    }).catch(err=>{
                    console.log("error",err.response)
                    })
                  }
                  else{
                    alert('Duplicated Pay Month!');
                  }
             
              }
            },
      deleteModal(mp){
                  this.monthlyPayment_id=mp.id;
                  this.monthlyPayment.status= mp.status,
                  this.monthlyPayment.newID= mp.newID,
                  this.monthlyPayment.netFee = mp.netFee,
                  this.monthlyPayment.payMonth = mp.payMonth,
                  this.monthlyPayment.payDate = mp.payDate,
                  this.monthlyPayment.description = mp.description,
                  this.monthlyPayment.siteID = mp.siteID,
                  this.monthlyPayment.siteOwner=mp.siteOwner;
                   
      },
      remove(){

                // axios.delete('/api/monthly-payment/monthlyPayments/'+this.monthlyPayment_id).then(res=>{
                //     console.log('deleted', res.data)
                //     this.getMonthlyPayments();
                //      this.monthlyPayment_id=null;
                //       $('#deleteModalCenter').modal('hide');
                //        $(".modal-backdrop").remove();
                //        $(".modal-backdrop").addClass();
                // }).catch(err=>{
                //     console.log("error ", err.response)
                // }
                this.monthlyPayment.isDeleted="delete";
                axios.put('/monthly-payment/monthlyPayments/'+this.monthlyPayment_id,this.monthlyPayment)
                    .then(res=>{
                    console.log("res ", res.data);
                        this.getMonthlyPayments();
                     this.monthlyPayment_id=null;
                      $('#deleteModalCenter').modal('hide');
                       $(".modal-backdrop").remove();
                       $(".modal-backdrop").addClass();
                }).catch(err=>{
                    console.log("error ", err.response)
                })
                    

               
      },
      search(){
        
        this.getMonthlyPayments();
      }
            
  },
        
      
        mounted(){
          this.getMonthlyPayments();
          this.getStatus();
        }
}
</script>
