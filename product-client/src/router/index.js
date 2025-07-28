import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import TestView from '@/views/TestView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      meta:{
        title:'Home'
      }
    },

    {
      path: '/test',
      name: 'test',
      component: TestView,
      meta:{
        title:'Test'
      }
    },
  ],
})

router.beforeEach((to, from, next) => {
    const defaultTitle = 'My App'
    document.title = to.meta.title || defaultTitle
    next()
})

export default router
