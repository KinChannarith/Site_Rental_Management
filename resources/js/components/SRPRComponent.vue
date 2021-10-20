<template>
      
                <div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="inputSearch" class="input__label">New ID</label> 
                            <input type="text" class="form-control input-style" id="inputSearch"
                                name="search"
                                value=""
                                v-model="SNewID"
                                
                                placeholder="search">                              
                        </div>
                        
                        <section class="col-md-2">
                            <div class="form-group" >
                                    <label for="inputYear" class="input__label"> <br/> </label>
                                    <select id="inputYear" class="form-control input-style" v-model="SFromYear"
                                        name="fromYear" >
                                        <option value="2020"  >{{year-1}}</option>
                                        <option value="2021" >{{year}}</option>
                                        <option value="2022" >{{year+1}}</option>
                                      </select>
                                   
                            </div>
                        </section>

                        
                        
                        <section class="col-md-2">
                            <div class="form-group" >
                                  <label for="inputYear" class="input__label"><br/></label>
                                  <select id="inputYear" class="form-control input-style"
                                      name="toYear" v-model="SToYear" >
                                        <option value="2020"  >{{year-1}}</option>
                                        <option value="2021" >{{year}}</option>
                                        <option value="2022" >{{year+1}}</option>
                                    </select>
                                 
                            </div>
                        </section>

                        
                        <br/>
                        
                          <button type="submit" id="btnSearch" class="btn btn-primary btn-style btn-border" style="width:100px" @click="search()">Search</button>
                          <button type="submit" id="btnDanger" class="btn btn-danger btn-style btn-border" style="width:100px" @click="reset()">Reset</button>
                    </div>  
              
              
              <div class="row">
                <div class="col-md-2">
                <a class='btn btn-primary icons' href="" type='submit' value='submit'>add</a>
                </div>
                <div class="col-md-10"></div>
              </div>
              <div >
              <div class="table-responsive" style="height:300px;">
                  <table class="table table-hover table-strip" id="dataTables">
                                          
                      <div class="row">          
                      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="200%">
                        <thead>
                          <tr>
                            <th width="10%" rowspan=2 style="vertical-align:middle;margin:400px;">Site ID</th>
                            <th width="10%" rowspan=2 style="vertical-align:middle;">Year</th>
                            <th width="10%" colspan=2>Janaury</th>
                            <th width="10%" colspan=2>February</th>
                            <th width="10%" colspan=2>March</th>
                            <th width="10%" colspan=2>April</th>
                            <th width="10%" colspan=2>May</th>
                            <th width="10%" colspan=2>June</th>
                            <th width="10%" colspan=2>July</th>
                            <th width="10%" colspan=2>August</th>
                            <th width="10%" colspan=2>September</th>
                            <th width="10%" colspan=2>October</th>
                            <th width="10%" colspan=2>November</th>
                            <th width="10%" colspan=2>December</th>
                          </tr>
                          <tr>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                            <th width="10%">Voucher No</th>
                            <th width="10%">Fee (USD)</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                           <tr v-for="srp in paymentReports.data" :key="srp.year">
                            <td>{{srp.newID}}</td>
                            <td>{{srp.Year}}</td>
                            <td></td>
                            <td>{{srp.Jan}}</td>
                            <td></td>
                            <td>{{srp.Feb}}</td>
                            <td></td>
                            <td>{{srp.Mar}}</td>
                            <td></td>
                            <td>{{srp.Apr}}</td>
                            <td></td>
                            <td>{{srp.May}}</td>
                            <td></td>
                            <td>{{srp.Jun}}</td>
                            <td></td>
                            <td>{{srp.Jul}}</td>
                            <td></td>
                            <td>{{srp.Aug}}</td>
                            <td></td>
                            <td>{{srp.Sep}}</td>
                            <td></td>
                            <td>{{srp.Oct}}</td>
                            <td></td>
                            <td>{{srp.Nov}}</td>
                            <td></td>
                            <td>{{srp.Des}}</td>
                            
                          </tr>
                        </tbody>
                    </table>
                    
              </div>
              </table>
              </div>
              <div class="container">
                      <div class="row">
                            <div class="col-10">
                              <!-- <p>Total records: {{ $reports->total()}}</p> -->
                            </div>
                            
                            <div class="col-2">
                                <!-- {!!$reports->appends(request()->input())->links(('pagination::bootstrap-4'))!!} -->
                            </div>
                      </div>
            </div>
        </div>

  <div class="row mt-4">
    <div class="col-md-10">

    </div>
    <div class="col-md-2">
        <div class="col-sm-12 offset-5 " style="margin-left: 60px;">
          <pagination :data="paymentReports" @pagination-change-page="getMonthlyPaymentReports">

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
        year: new Date().getFullYear(),
        getMonthlyPaymentReportURL:'',
        paymentReports:{},
        SNewID:'',
        SFromYear: new Date().getFullYear(),
        SToYear: new Date().getFullYear(),
    }
  },
  methods:{
      getMonthlyPaymentReports(page=1){
        
          this.getMonthlyPaymentReportURL ='/api/getMonthlyPaymentReport?page='+page
          +"&SNewID=" + this.SNewID +"&SFromYear=" + this.SFromYear +"&SToYear=" + this.SToYear;
        
        axios.get(
            this.getMonthlyPaymentReportURL
          )
          .then(response=>{
            this.paymentReports =response.data;

          })
      },
      search(){
        this.getMonthlyPaymentReports();
      },
      reset(){
        this.SNewID="",
        this.SFromYear= this.year,
        this.SToYear = this.year,
        this.getMonthlyPaymentReports();
      }
  },
  mounted(){
   
    this.getMonthlyPaymentReports();
  }
}
</script>
