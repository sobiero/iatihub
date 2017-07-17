/*eslint-disable */

import Vue from 'vue'
import Router from 'vue-router'

// Auth
import { requireAuth, redirectIfLoggedIn, ifLoggedOutGotoToLogin } from '@/utils/auth'

// Containers
import Full from '@/containers/Full'

// Views
import Dashboard from '@/views/Dashboard'
import Myprofile from '@/views/Myprofile'

// Views - Pages
//Auth
import Login from '@/views/pages/auth/Login'
import Logout from '@/views/pages/auth/Logout'
import Register from '@/views/pages/auth/Register'


import NotFoundComponent from '@/views/pages/NotFoundComponent'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: '/', //simon/iatihub/dist/
  linkActiveClass: 'open active',
  scrollBehavior: () => ({ y: 0 }),
  routes: [
    {
      path: '/',
      redirect: '/dashboard',
      beforeEnter: requireAuth,
      name: 'Home',
      component: Full,
      children: [
        {
          path: 'dashboard',
          name: 'Dashboard',
          beforeEnter: requireAuth,
          component: Dashboard
        },
        {
          path: 'myprofile',
          name: 'My Profile',
          beforeEnter: requireAuth,
          component: Myprofile
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
          beforeEnter: redirectIfLoggedIn,
          component: Login
        },
        {
          path: 'logout', 
          name: 'Logout',
          beforeEnter: ifLoggedOutGotoToLogin,
          component: Logout
        },
        {
          path: 'register',
          name: 'Register',
          beforeEnter: redirectIfLoggedIn,
          component: Register
        }
      ]
    },
	{ path: '*', component: NotFoundComponent }
  ]
}); 
