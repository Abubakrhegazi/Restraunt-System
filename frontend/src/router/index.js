import { createRouter, createWebHistory } from 'vue-router'
import UserLogin from '@/views/auth/UserLogin.vue'
import HomeView from '@/views/HomeView.vue'
import UserRegestiration from '@/views/auth/UserRegestiration.vue'
import cashierView from '@/views/clientsViews/CashierView.vue'

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
  },{
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
    path: '/registration',
    redirect: '/signup'
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
