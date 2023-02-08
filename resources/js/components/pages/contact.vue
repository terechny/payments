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
                          <input class="form-control" v-model="form.name"> 
                      </div> 

                      <div class="form-group mb-2">
                          <label>Phone</label>
                          <input class="form-control" v-model="form.phone"> 
                      </div> 
                        
                      <div class="form-group mb-2"> 
                         <label>Massage</label>
                         <textarea class="form-control" v-model="form.message"></textarea>
                      </div>
                  </form>                        
               
                  <div class="mt-4">                 
                      <button @click="send" class="btn btn-sm btn-outline-primary m-2">Send</button>                    
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
             form: []
          }
      },
      mounted(){
        
      },
      methods: {
  
        send(){

            let params = {
                'name': this.form.name,
                'phone': this.form.phone,
                'message': this.form.message,
            }

            console.log(params)

            axios.post( 'api/application', params).then(res=>{  

                console.log(res)

            }).catch(err => {

              console.log(err) 
            }) 
            
        }

      }
  
  
  }
  </script>
  
  <style>
  </style>