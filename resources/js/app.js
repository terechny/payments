// require('./bootstrap');

import { createApp } from "vue";
import router from './router'

import HeaderComponent from './components/bloks/header.vue'

const newApp = {

    components: {
        HeaderComponent
    }    
}

createApp(newApp).use(router).mount('#app')
//createApp(newApp).mount('#app')

