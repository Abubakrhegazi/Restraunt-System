import { createRouter, createWebHistory } from 'vue-router'
import UserLogin from '@/views/auth/UserLogin.vue'
import HomeView from '@/views/HomeView.vue'

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
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
