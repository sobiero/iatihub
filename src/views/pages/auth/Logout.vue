<template>
 <p class="text-center mt-4">You have been successfully logged out</p>
</template>
<script>
/* eslint-disable */

import {logout} from '@/utils/auth'

export default {
  name: 'Logout',
  mounted:function(){
        logout() 
  },
  methods: {
    a: function() {
      //logout(); 
    } //
  }
}
</script>
