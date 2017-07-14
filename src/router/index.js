/*eslint-disable */

import Vue from 'vue'
import Router from 'vue-router'

// Containers
import Full from '@/containers/Full'

// Views
import Dashboard from '@/views/Dashboard'

// Views - Pages
import Login from '@/views/pages/Login'
import Register from '@/views/pages/Register'
import NotFoundComponent from '@/views/pages/NotFoundComponent'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: '/simon/iatihub/dist/',
  linkActiveClass: 'open active',
  scrollBehavior: () => ({ y: 0 }),
  routes: [
    {
      path: '/',
      redirect: '/dashboard',
      name: 'Home',
      component: Full,
      children: [
        {
          path: 'dashboard',
          name: 'Dashboard',
          component: Dashboard
        }

      ]
    },
	{
      path: '/auth',
      redirect: '/auth/login',
      name: 'Auth',
      component: {
        render (c) { return c('router-view') }
      },
      children: [
        {
          path: 'login', 
          name: 'Login',
          component: Login
        },
        {
          path: 'register',
          name: 'Register',
          component: Register
        }
      ]
    },
	{ path: '*', component: NotFoundComponent }
  ]
})
