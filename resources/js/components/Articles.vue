<template>
    <div>
        <h2>Sites</h2>
        <div class="card card-body" v-for="site in sites" v-bind:key="site.id">
            <h3>{{site.newID}}</h3>
            <p>{{site.fullname}}</p>
        </div>
        <div>
            <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-bind:class="[{disabled: !pagination.prev_page_url}]"  class="page-item">
                <a class="page-link" href="#" 
                @click="fetchSites(pagination.prev_page_url)"
                aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
                <a class="page-link" href="#" 
                @click="fetchSites(pagination.next_page_url)"
                aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            </ul>
            </nav>
        </div>
       
    </div>
</template>
<script>
    export default{
        data(){
            return{
                sites:[],
                site:{
                    id:'',
                    newID:'',
                    oldID:'',
                    startDate:'',
                    endDate:'',
                    contactNo:'',
                    paymentTerm:'',
                    siteOwner:'',
                    vendorName:'',
                    vattin:'',
                    location:'',
                    contructionDate:'',
                    siteStatus:'',
                    changeDate:'',
                    netFee:'',
                    FRAIDate:'',
                    tenant:'',
                    additionalFee:'',
                    additionalService:''
                },
                site_id: '',
                pagination:{},
                edit: false,
                pageSize:3,
            }
        },
        created(){
            this.fetchSites();
        },
        methods:{
            fetchSites(){
                let vm = this;
                //var page_url = page_url || 'http://127.0.0.1:8000/sites'
               fetch('http://127.0.0.1:8000/sites')
               .then(res=>res.json())
               .then(res=>{
                // console.log(res.data);
                this.sites = res.data;
                vm.makePagination(res.meta,res.links);
               }) 
               .catch(err =>console.log(err));
            },
            makePagination(meta,links){
                let pagination={
                    current_page: meta.current_page,
                    last_page:meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev,
                }
                this.pagination = pagination;
            }
        }
    }
</script>
