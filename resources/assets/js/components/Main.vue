<template>
  <div class="manager-container">
    <div class="header-container row">
        <div class="header-logo-container col-md-6">
            <a href="#">
                <h4><span class="logo-user">USER</span> <span class="logo-manager">MANAGER</span></h4>
            </a>
        </div>
        <div class="col-md-6 text-right">
          <button type="button" v-on:click="logout" class="btn btn-primary">Logout</button>
        </div>
    </div>
    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>

import auth from '../services/auth.js';
import users from '../services/users.js';

export default {
    methods: {
        logout: function () {
          auth.logout();
          
        }
    }
}
</script>