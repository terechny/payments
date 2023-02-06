<template>
  <div class="container">

        <h5 class="mt-4 mb-4">Dashboard</h5>
        
        <div class="row">
            <div class="col-sm-5">
            
                <p><b>User</b></p>
                <hr>
                
                <table class="table">
                    <tbody>
                        <tr>
                           <td> <b> {{ user.name }} </b> </td>
                        </tr>
                        <tr> 
                           <td> {{ user.email }} </td>
                        </tr>
                        <tr> 
                           <td> {{ user.phone }} </td>
                        </tr>                                                  
                    </tbody>
                </table>
                <div class="mt-4">

                    <router-link :to="'/users/' + user.id + '/edit/'">
                         <button class="btn btn-sm btn-outline-primary m-2">Redact data</button>
                    </router-link>
                    <button @click="del" class="btn btn-sm btn-outline-danger m-2">Delete data</button>                   
                </div>
            </div>

            <div class="col-sm-5">
            
              <p><b>Payments</b></p>
              <hr>            
              <table class="table">
                  <thead>
                      <tr> 
                         <th>Amount</th>  
                         <th>Date</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(payment, index) in payments">                          
                      <td> {{ payment.amount }} </td>
                      <td> {{ payment.created_at }} </td>
                    </tr>
                  </tbody>
              </table>
              <div class="row">
                  <div class="col-sm-6">
                      <input type="number" class="form-control form-control-sm" v-model="payment">
                  </div>
                  <div class="col-sm-4">
                      <button class="btn btn-sm btn-outline-primary" @click="addPayment">Add Payment</button>
                  </div>
              </div>
            </div>
        </div>

  </div>
</template>

<script>
import axios from 'axios'
export default {

    data(){

        return{
           user: [],
           payments: [],
           payment: 0,
        }
    },
    mounted(){
       this.getUserData()
    },
    methods: {

      getUserData(){

        let user_id =  this.$route.params.id
    
        axios.get( '/api/users/' + user_id ).then(res=>{               
            this.user = res.data.data
            this.getUserPayments(user_id)
        }).catch(err => {
              console.log(err) 

        })  
                      
      },
      getUserPayments(user_id){

        axios.get( '/api/users/' + user_id + '/payments' ).then(res=>{               
            this.payments = res.data.data
        })  
      },

      del(){
        
          if(confirm("Delete record")){

            axios.delete( '/api/users/' + this.$route.params.id ).then(res=>{               

                if(res.data.data){
                    window.location.href = '/dashboard';
                }
            }) 

          }

      },
      addPayment(){

        let params = {

           'user_id': this.user.id,
           'amount': this.payment
        }

        axios.post( '/api/payments', params).then(res=>{               
          
          this.getUserPayments(this.user.id)
        })         
      }
    }


}
</script>

<style>

</style>