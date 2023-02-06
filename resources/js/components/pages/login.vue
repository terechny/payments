<template>
  <div class="container">

        <h5 class="mt-4 mb-4">Login</h5>
        
        <div class="row">
            <div class="col-sm-5">
                <hr>

                <form>
                
                    <div class="form-group mb-2">
                        <label>Email</label>
                        <input type="email" class="form-control" v-model="email"> 
                    </div> 
                      
                    <div class="form-group mb-2"> 
                       <label>Password</label>
                       <input type="password" class="form-control" v-model="password"> 
                    </div>
                </form>                        
             
                    <button @click="login" class="btn btn-sm btn-outline-primary mt-2">Login</button>        
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
            email:null,
            password:null
        }
    },
    mounted(){
    
    },
    methods: {

       login(){

	        axios.get('/sanctum/csrf-cookie').then(response => {
			    
			    let params = {
			       'email': this.email,
			       'password': this.password
			    }

			    axios.post('/login', params).then(response => {

	                 console.log(response)
                     window.location.href = '/dashboard'
			    })
			});

       }

    }

}
</script>

<style>
</style>
