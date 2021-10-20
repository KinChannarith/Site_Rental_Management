<template>
    <div>
        <ul class="nav navbar-right" id="navbar">
                            	<li><a id="Link1" class="link-kumya scroll"><span data-letters="Site Rental List"> 
                                    <router-link to="/site-rental/index">
                                    Site Rental List
                                    </router-link>
                                    </span></a></li>
								<li><a id="Link2" href="http://127.0.0.1:8000/monthly-payment/index" class="link-kumya scroll"><span data-letters="Monthly Payment List">Monthly Payment List</span></a></li>
								<li><a id="Link3" href="http://127.0.0.1:8000/report/index" class="link-kumya scroll"><span data-letters="Report">Report</span></a></li>
								<li><a id="Link4" href="http://127.0.0.1:8000/vendor-list/list" class="link-kumya scroll"><span data-letters="Vendor List">Vendor List</span></a></li>
								<li><a id="Link5" href="http://127.0.0.1:8000/site-rental-payment-report/index" class="link-kumya"><span data-letters="SRPR">SRPR</span></a></li>	
								<li><a id="Link6" href="http://127.0.0.1:8000/site-rental-payment/index" class="link-kumya"><span data-letters="SRP">SRP</span></a></li>
								<li><a href="http://127.0.0.1:8000/logout" class="link-kumyaLogout">
										 <span data-letters="Logout">{{this.userName}}</span>
									</a>
								</li>
							
                            </ul>
    </div>
</template>
<script>
export default {
        data(){
            return{
                messageText: ''
            }
        },
     props: {
            userName: String ,
    },
        methods:{
            sendMessage(){
                this.$emit('messagesent', {
                    message:this.messageText,
                    user: {
                    name: this.userName
                            }
                });
                this.messageText = '';
            }
        }
    }
</script>
