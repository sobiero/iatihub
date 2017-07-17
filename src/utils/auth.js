/* eslint-disable */

import Router from 'vue-router';
import axios from 'axios';


// import Auth0Lock from 'auth0-lock';

const ID_TOKEN_KEY = 'id_token';

const ACCESS_TOKEN_KEY = 'access_token';

var router = new Router({

   //mode: 'history',

});

export function login(context, creds, redirect) {
  axios.post('/simon/iatihub/api/auth/login', {
    username: creds.username,
    password: creds.password
  })
  .then(function (response) {
    //console.log(response.data.payload.jwt);
    localStorage.setItem('jwt', response.data.payload.jwt);
    //var jwt = localStorage.getItem('jwt');
    //console.log(jwt);
    //router.push('/');
    context.$router.replace('/');

  })
  .catch(function (error) {
    console.log(error); //
  });
   
}

export function logout(to, from, next) {

  clearIdToken();

  clearAccessToken();
  localStorage.removeItem('jwt');

  //this.$router.push('/auth/login');
  

}

export function requireAuth(to, from, next) {

  console.log( isLoggedIn() );

  if (!isLoggedIn()) {

    next({

      path: '/auth/login',

      query: { redirect: to.fullPath }

    });

  } else {

    next();

  }

}

export function redirectIfLoggedIn(to, from, next) {

  console.log( isLoggedIn() );

  if (isLoggedIn()) {

    next({

      path: '/'

    });

  } else {

    next();

  }

}

export function ifLoggedOutGotoToLogin(to, from, next) {

  console.log( isLoggedIn() );

  if (!isLoggedIn()) {

    next({

      path: '/auth/login'

    });

  } else {

    next();

  }

}

export function getIdToken() {

  return localStorage.getItem(ID_TOKEN_KEY);

}

export function getAccessToken() {

  return localStorage.getItem(ACCESS_TOKEN_KEY);

}

function clearIdToken() {

  //localStorage.removeItem(ID_TOKEN_KEY);
  localStorage.removeItem('jwt');

}

function clearAccessToken() {

  //localStorage.removeItem(ACCESS_TOKEN_KEY);

}


// Get and store access_token in local storage

export function setAccessToken() {

  let accessToken = getParameterByName('access_token');

  localStorage.setItem(ACCESS_TOKEN_KEY, accessToken);

}


export function isLoggedIn() {

 //const idToken = getIdToken();

 // return !!idToken && !isTokenExpired(idToken);
    var jwt = localStorage.getItem('jwt');
    if(jwt)
    {
      ///this.user.authenticated = true;
      return true;
    }
    else 
    {
      //this.user.authenticated = false;
      return false;
    }

}
