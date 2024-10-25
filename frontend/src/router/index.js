import { createRouter, createWebHistory } from 'vue-router'
import UserLogin from '@/views/auth/UserLogin.vue'
import HomeView from '@/views/HomeView.vue'
import UserRegestiration from '@/views/auth/UserRegestiration.vue'
import EmployeeView from '@/views/clientsViews/EmployeeView.vue'
import cashierView from '@/views/clientsViews/CashierView.vue'
<<<<<<< HEAD

=======
import managerView from '@/views/clientsViews/ManagerView.vue'
>>>>>>> 5ead8d9af617f70d5ed37921ec753967cdfc9312

const routes = [
  {
    path: '/',
    name: 'homeView',
    component: HomeView
  },
  {
    path: '/login',
    name: 'userlogin',
    component: UserLogin
  },
  ,
  
  {
    path: '/signup',
    name: 'userRegistration',
    component: UserRegestiration
  },
{
  path: '/cashier',
  name: 'cashierView',
  component: cashierView
},
{
  path: '/manager',
  name: 'managerView',
  component: managerView
},
{
  path: '/EmpView',
  name: 'EmployeeView',
  component: EmployeeView
},
  {
    path: '/registration',
    redirect: '/signup'
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
