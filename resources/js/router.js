import { createRouter, createWebHistory } from 'vue-router'


import HomeComponent from './components/pages/home.vue'
import UserComponent from './components/pages/user.vue'
import EditComponent from './components/pages/edit.vue'
import DashboardComponent from './components/pages/dashboard.vue'
import addComponent from './components/pages/add.vue'
import loginComponent from './components/pages/login.vue'

const routes = [
    {
      path: "/",
      name: "home",
      component: HomeComponent,
    },
    {
      path: "/dashboard",
      name: "dashboard",
      component: DashboardComponent,
    },
    {
      path: "/users/:id",
      name: "user",
      component: UserComponent,
    },
    {
      path: "/users/:id/edit",
      name: "edit",
      component: EditComponent,
    },  
    {
      path: "/users/add",
      name: "add",
      component: addComponent,
    },  
    {
      path: "/login",
      name: "login",
      component: loginComponent,
    }  

  ];


const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;