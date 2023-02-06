<template>
  <div class="container">

        <h5 class="mt-4 mb-4">Dashboard</h5>
        
        <div class="row">
            <div class="col-sm-5">
            
                <p><b>Edit Data</b></p>
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
             
                <div class="mt-4">                 
                    <button @click="update" class="btn btn-sm btn-outline-primary m-2">Redact data</button>                    
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
       this.getUserData()
    },
    methods: {

        getUserData(){

            let user_id =  this.$route.params.id
      
            axios.get( '/api/users/' + user_id ).then(res=>{               
                this.user = res.data.data
            })             
        },
        update(){
            
            axios.put( '/api/users/' + this.user.id, this.user ).then(res=>{               
            
                if(res.data){

                    window.location.href = '/users/'+ this.user.id;
                } 
            }) 
        }
    }


}
</script>

<style>
</style>
