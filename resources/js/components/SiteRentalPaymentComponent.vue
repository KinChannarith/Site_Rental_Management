<template>
    <div>
        <div class="container-fluid">
                 <h3><b>Site Rental Payment</b><span></span></h3>
                <div class="row">
                         
                            <section class="col-md-3">
                                <div class="form-group">
                                    <label for="inputMonth" class="input__label">Select a month and a year</label>
                                    <select v-model="SMonth" class="form-control input-style" 
                                        >
                                        <option value='01' >January</option>
                                        <option value="02" >February</option>
                                        <option value="03" >March</option>
                                        <option value="04" >April</option> 
                                        <option value="05" >May</option>
                                        <option value="06" >June</option>
                                        <option value="07" >July</option>
                                        <option value="08" >August</option> 
                                        <option value="09" >September</option>
                                        <option value="10" >October</option>
                                        <option value="11" >November</option>
                                        <option value="12" >December</option> 
                                    </select>
                                   
                                </div>
                            </section>
                        <section class="col-md-2">
                          <div class="form-group">
                                  <label  class="input__label"><br/></label>
                                  <select v-model="SYear" class="form-control input-style"
                                       >
                                      <option :value="pyear">{{pyear}}</option>
                                      <option :value="cyear" selected>{{cyear}}</option>
                                      <option :value="nyear">{{nyear}}</option>
                                    </select>
                                  
                          </div>
                        </section>
                        <section class="col-md-2">
                          <div class="form-group">
                                  <label class="input__label">Site Owner</label>
                                  <select v-model="SSiteOwner" class="form-control input-style"
                                      >
                                    <option v-for="item in siteOwners" :value="item">
                                        {{item}}
                                    </option>
                                    </select>
                                 
                          </div>
                        </section>
                        <section class="col-md-2">
                          <div class="form-group">
                            <br/>
                            <button type="submit" class="btn btn-danger btn-style btn-border" style="width:100px" @click="reset()">Reset</button>
                          </div>
                        </section>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                            <label for="inputPaymentStatus" class="input__label">Payment status</label>
                                <input type="text" class="form-control input-style" id="inputPaymentStatus"
                                    name="paymentStatus"
                                    v-model="SPaymentStatus"
                                    value=""
                                    readOnly>
                      </div>
                      <div class="col-md-2">
                            <label for="inputSAPVoucherNumber" class="input__label">SAP voucher number</label>
                                <input type="text" class="form-control input-style" id="inputSAPVoucherNumber"
                                    name="SAPNumber"
                                    value=""
                                    readOnly>
                      </div>
                      <div class="col-md-2">
                            <label for="inputPaymentDateTime" class="input__label">Payment date time</label>
                                <input type="text" class="form-control input-style" id="inputPaymentDateTime"
                                    name="paymentDateTime"
                                    value=""
                                    readOnly>
                      </div>
                      <div class="col-md-2">
                            <label for="inputPaymentBy" class="input__label">Payment by</label>
                                <input type="text" class="form-control input-style" id="inputPaymentBy"
                                    name="paymentBy"
                                    value=""
                                    readOnly>
                      </div>
                </div>
            
            <br/>


            <!--  -->
            <div class="table-responsive">                 
                    <div class="row">          
                      <table id="example" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th width="10%">Payment term</th>
                            <th width="11%" id = "HeaderChange">Total site under construction</th>
                            <th width="11%">Total site ready for installation</th>
                            <th width="11%">Total site on-air</th>
                            <th width="10%">Total site dismanted/terminated</th>
                            <th width="11%">Total rental fee per month (USD)</th>
                            <th width="11%">Total additional charge fee (USD)</th>
                            <th width="13%">Total site to be paid</th>
                            <th width="12%">Total amount to be paid (USD)</th>
                          </tr>
                        </thead>
                        <tbody>                     
                         <tr v-for="srp in siteRentalPayments.data" :key="srp.paymentTerm">
                            <td>{{srp.paymentTerm}}</td>
                            <td>{{srp.allUnderInstallation}}</td>
                            <td>{{srp.allStatus}}</td>
                            <td>{{srp.allOnAir}}</td>
                            <td>{{srp.allShutdown}}</td>
                            <td>{{srp.netFee}}</td>
                            <td>{{srp.additionalFee}}</td>
                            <td>{{srp.allSites}}</td>
                            <td>{{srp.totalAmount + srp.additionalFee}}</td>
                         </tr>
                         
                         
                        </tbody>
                    </table>
                   
                    <div class="container-fluid">
                        <div class="row">
                                    <div class="col-md-2 col-lg-2">
                                      <a class='btn btn-primary' id="detail" style="width:190px" type='submit' value='submit'>Show site details</a>
                                    </div>

                                    <div class="col-md-2 col-lg-2" >
                                     
                                      <!-- <a class='btn btn-primary' :href="urlUpdate" style="width:190px" id="updatePayment" type='submit' value='submit' data-toggle="modal" data-target="#smartModalCenter">Update payment status</a> -->
                                      <a class='btn btn-primary' :href="urlUpdate" style="width:190px" id="updatePayment" type='submit' value='submit' >Update payment status</a>

                                    </div>
                                   
                        </div>
                      </div>
                    <br/>
              </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
  data(){
    return{
      urlUpdate: '/monthly-payment/index',
      siteRentalPayments: {},
      getSiteRentalPaymentURL:'',
      siteOwners:null,
      SPaymentStatus:'',
      SSiteOwner:"Smart Axiata",
      cyear: new Date().getFullYear(),
      pyear: (new Date().getFullYear())-1,
      nyear: (new Date().getFullYear())+1,
      SYear: new Date().getFullYear(),
      cmonth: ((new Date().getMonth())+1) <10? ("0"+((new Date().getMonth())+1)) : ((new Date().getMonth())+1),
      SMonth: ((new Date().getMonth())+1) <10? ("0"+((new Date().getMonth())+1)) : ((new Date().getMonth())+1),
      fullMonthYear:(new Date().getFullYear())+"-"+ ((new Date().getMonth())+1) <10? ("0"+((new Date().getMonth())+1)) : ((new Date().getMonth())+1)+"-01",
    }
  },
  watch:{
    SMonth:function(){
      this.getSiteRentalPayments();
    },
    SSiteOwner:function(){
      this.getSiteRentalPayments();
      if(this.SSiteOwner=="Smart Axiata")
      {
         $('#HeaderChange').html("Total site under construction");
      }
      else
      {
        $('#HeaderChange').html("Total site under installation");
      }
    },
    SYear:function(){
      this.getSiteRentalPayments();
    }
  },
  methods:{

     reset(){
       this.SYear=this.cyear;
       this.SMonth=this.cmonth;
       this.SSiteOwner = "Smart Axiata";
     },
      
      getSiteRentalPayments(){
      this.fullMonthYear= this.SYear+"-"+this.SMonth+"-01";
      this.getSiteRentalPaymentURL ='/api/getMonthlyPayments?SPayMonth='+this.fullMonthYear+'&SSiteOwner='+this.SSiteOwner;
      
      axios.get(
          this.getSiteRentalPaymentURL
        )
        .then(response=>{
          this.siteRentalPayments =response.data;
         
          if(this.siteRentalPayments.data[0].allSites + this.siteRentalPayments.data[1].allSites + this.siteRentalPayments.data[2].allSites + this.siteRentalPayments.data[3].allSites>0)
          {
            this.SPaymentStatus="Paid";
          }
          else
          {
            this.SPaymentStatus="Unpaid";
            
          }
        })
        
    },
    getSiteOwner(){
      axios.get(
          '/api/siteOwner'
        )
        .then(response=>{
          this.siteOwners =response.data;
          
              
        })
    }
  },
  mounted(){
      
      this.getSiteRentalPayments();
      this.getSiteOwner();
      
  }
};
</script>
