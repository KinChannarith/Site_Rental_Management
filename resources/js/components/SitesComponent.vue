<?php
use App/Models/Helpers;
?>
<template>



<div class="container-fluid">
          <div class="row">  
              <div class="col-md-10">
              </div>
              <div class="col-md-2">
                <div style="margin-left: 70px;">
                  <!-- <a class='btn btn-primary' href="{{ route('site-rental.Create') }}" type='submit' value='submit'>Export to Excel</a> -->
                  <a   
                    :href="url" class='btn btn-primary' value='submit' type='submit'>Export to Excel</a>

              </div>
              </div>
           
          </div>
          <br/>
      
  <div class="table-responsive">  
  <table id="tbSites" class="table table-bordered table-striped table-hover" width="100%" style="table-layout:fixed;">
    <thead>
       <tr>
                            <th width="200" colspan=2>
                              Site ID 
                             
                            </th>
                            <th  width="360" colspan=2>Contract period</th>
                            <th  width="130" rowspan=2>Contract No.</th>
                            <th width="160" rowspan=2>Payment term</th>
                            <th width="180" rowspan=2>Site owner</th>
                            <th width="180" rowspan=2>Vendor name</th>
                            <th width="180" rowspan=2>VATTIN</th>
                            <th width="200" rowspan=2>Location</th>
                            <th width="180" rowspan=2>Construction date</th>
                            <th width="120" rowspan=2>Site status</th>
                            <th width="130" rowspan=2>Status change date</th>
                            <th width="100" rowspan=2>Rental fee</th>
                            <th width="180" rowspan=2>Adjust RFAI date</th>
                            <th width="100" rowspan=2>Tenant</th>
                            <th width="100" rowspan=2>Additional charge fee</th>
                            <th width="100" rowspan=2>Additional service</th>
                          </tr>
                          <tr>
                            <th >New ID
                               <!-- <span> &uarr; </span>
                              <span> &darr; </span> -->
                            </th>
                            <th>Old ID</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            
                          </tr>
                          <!-- search -->
                          <tr style="background-color: green !important">
                              <td>
                                <input v-model="SNewID"
                                  type="search"
                                  class="form-control"
                                  placeholder=""

                                >
                              </td>
                              <td>
                                <input v-model="SOldID"
                                  type="search"
                                  class="form-control"
                                  placeholder=""
                                >
                              </td>
                               <td>
                                <input v-model="SStartDate"
                                  type="date"
                                  class="form-control"
                                  placeholder=""

                                >
                              </td>
                              <td>
                                <input v-model="SEndDate"
                                  type="date"
                                  class="form-control"
                                  placeholder=""

                                >
                              </td>
                              <td></td>
                              <td>
                                <div class="form-group">
                                  <select v-model="SPaymentTerm" class="form-control input-style">
                                    <option value="">All</option>
                                    <option value="Monthly">Monthly</option>
                                    <option value="Quaterly">Quaterly</option>
                                    <option value="Semesterly">Semesterly</option>
                                    <option value="Yearly">Yearly</option>
                                  </select>
                                </div>

                                
                              </td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                               <td>
                                <input v-model="SConstructionDate"
                                  type="date"
                                  class="form-control"
                                  placeholder=""

                                >
                              </td>
                              <td> 
                                <div class="form-group">
                                  <select v-model="SStatus" class="form-control input-style">
                                    <option value=""></option>
                                    <option v-for="(item,key) in statuses" :value="key">
                                        {{item}}
                                    </option>

                                  </select>
                                </div>
                              </td>
                              <td></td>
                              <td>
                                <input v-model="SNetFee"
                                  type="search"
                                  class="form-control"
                                  placeholder=""
                                >
                              </td>
                               <td>
                                
                              </td>
                              <td></td>
                              <td></td>
                              <td></td>
                          </tr>
    </thead>
    <tbody>
      <tr v-for="site in sites.data" :key="site.ID">
                          <td>{{site.newID}}</td>
                          <td>{{site.oldID}}</td> 
                          <td>{{site.startDate}}</td>
                          <td>{{site.endDate}}</td>
                          <td>{{site.contractNumber}}</td>
                           <td>{{(site.pmtMethod)}}</td>
                           <td>{{site.siteOwner}}</td>
                           <td>{{site.fullname}}</td>
                           <td></td>
                           <td>{{site.address}}</td>
                           <td>{{site.constructionDate}}</td>
                           <td>{{site.status}}</td>
                           <td>{{site.updated_at}}</td>
                           <td>{{site.netFee}}</td>
                           <td>{{site.RFAIDate}}</td>
                           <td>{{site.tenant}}</td>
                           <td>{{site.additionalFee}}</td>
                           <td>{{site.additionalService}}</td>

                           <!-- <td>{{site.address}}</td>
                           <td>{{$site.constructionDate}}</td>
                           
                           <td>site.status</td>
                           <td></td>
                           <td>{{site.netFee}}</td>
                           <td>{{site.RFAIDate}}</td>
                           <td>{{site.tenant}}</td>
                           <td>{{site.additionalFee}}</td>
                           <td>{{site.additionalServices}}</td> -->

                           <!-- 
                           <td>{{site.fullname}}</td>
                           <td></td>
                           <td>{{site.address}}</td>
                           <td>{{$site.constructionDate}}</td>
                           
                           <td>{{site.status}}</td>
                           <td></td>
                           <td>{{site.netFee}}</td>
                           <td>{{site.RFAIDate}}</td>
                           <td>{{site.tenant}}</td>
                           <td>{{site.additionalFee}}</td>
                           <td>{{site.additionalServices}}</td> -->
      </tr>
    </tbody>
  </table>
  
  </div>
  <div class="row mt-4">
      <div class="col-sm-12 offset-5 " style="margin-left: 60px;">
          <pagination :data="sites"  :limit=1
              v-model="currentPage"
            :total-rows="rows"
            :per-page="perPage"
            @pagination-change-page="getSites"
           >

          </pagination>
        </div>
  </div>

<div>

</div>
   





</div>


</template>

<script>

export default {
  data(){
    return{
      rows: 100,
        perPage: 1,
        currentPage: 5,
        

      sites: {},
      checked:[],
      paginate: 10,
      SNewID:"",
      SOldID:"",
      SStartDate:"",
      SEndDate:"",
      SPaymentTerm:"",
      SConstructionDate:"",
      SNetFee:"",
      SRFAIDate:"",
      url:'',
      SStatus:'',
      getSitesWithoutPaginate:"",
      getSitesUrl:"",
      statuses: {'On Air':'On Air',
      'shut down':'shut down',
      'Under Installation':'Under Installation',
      'status':'status',
      'Under Construction':'Under Construction'},
    }
  },
  watch:{
    paginate:function(){
      this.getSites();
    },
    SNewID:function(){
      this.getSites();
    },
    SOldID:function(){
      this.getSites();
    },
    SStartDate:function(){
      this.getSites();
    },
    SEndDate:function(){
      this.getSites();
    },
    SPaymentTerm:function(){
      this.getSites();
      
      
      
    },
    SConstructionDate:function(){
      this.getSites();
    },
    SNetFee:function(){
      this.getSites();
    },
    SRFAIDate:function(){
      this.getSites();
    },
    SStatus:function(){
      this.getSites();
    }
  },
  methods:{
      
      getSites(page = 1){
        this.getSitesWithoutPaginate ='/api/sites?SNewID='+this.SNewID 
        +'&SOldID='+this.SOldID 
        +'&SStartDate='+this.SStartDate
        +'&SEndDate='+this.SEndDate
        +'&SPaymentTerm='+this.SPaymentTerm
        +'&SConstructionDate='+this.SConstructionDate
        +'&SNetFee='+this.SNetFee
        +'&SRFAIDate='+this.SRFAIDate
        +'&SStatus='+this.SStatus
      this.getSitesUrl = this.getSitesWithoutPaginate.concat(
                 "&paginate=" + this.paginate +"&page=" + page
            );
        axios.get(
          this.getSitesUrl
        )
        .then(response=>{
          this.sites =response.data;
         
              
        }),
        axios.get(this.getSitesWithoutPaginate).then(response => {
                // console.log(response.data);
                this.checked = [];
                response.data.data.forEach(student => {
                    this.checked.push(student.id);
                });
                this.url="/site-rental-payment/export/"+this.checked;        
        });
        
        //this.url='site-rental-payment/export/'+this.checked;
      },
      // exportAll(){
          
                
      //           //this.selectAll = true;
      // },
  },
  mounted(){
    this.getSites();
  }
};
$(document).ready(function () {
$('#tbSites').DataTable({
"scrollX": true
});
$('.dataTables_length').addClass('bs-select');
});
</script>
