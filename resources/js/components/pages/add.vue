<template>
  <div class="container">

        <h5 class="mt-4 mb-4">Dashboard</h5>
        
        <div class="row">
            <div class="col-sm-5">
            
                <p><b>Add Data</b></p>
                <hr>

                <form>
                
                    <div class="form-group mb-2">
                        <label>Name</label> 
                        <input class="form-control" v-model="user.name"> 
                    </div> 
                      

                    <div class="form-group mb-2">
                        <label>Email</label>
                        <input class="form-control" v-model="user.email"> 
                    </div> 
                      
                    <div class="form-group mb-2"> 
                       <label>Phone</label>
                       <input class="form-control" v-model="user.phone"> 
                    </div>
                </form>                        
             
                    <button @click="add" class="btn btn-sm btn-outline-primary m-2">Add data</button>        
                <div class="mt-4">                             
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
           user: []
        }
    },
    mounted(){
    
    },
    methods: {

        add(){ 

            let params = { 
                  'name': this.user.name,
                  'email': this.user.email,
                  'phone': this.user.phone, 
            }

            axios.post( '/api/users', params ).then(res=>{  

                if( res.status == 200 ){
                   window.location.href = '/users/'+ res.data.id
                }             
            })             
        },

    }


}
</script>

<style>
</style>

