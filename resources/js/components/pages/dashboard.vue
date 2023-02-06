<template>
    <div class="container">
        
        <h5 class="mt-4 mb-4">Dashboard</h5>
        

        <div class="row">
            <div class="col-sm-5">
            
                <p><b>Users</b></p>
                <hr>
					
                <div>			
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users">                          
    							<td>
                                    <router-link :to="'/users/' + user.id" style="text-decoration:none;">{{ user.name }}</router-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <router-link :to="'/users/add'">
                         <button class="btn btn-sm btn-outline-primary m-2">Add user</button>
                </router-link>

            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
	     return{	 	 
			 users: []
			 }
    },
    mounted() {
       this.getUsers() 
    },
    methods:{
        
        getUsers(){

            axios.get('/api/users').then(res=>{   
  
                this.users = res.data.data

            }).catch(err => {
                window.location.href = '/' 

            }) 
        }
        
    }
}
</script>

<style>
    

</style>