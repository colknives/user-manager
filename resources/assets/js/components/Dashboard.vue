<template>
    <section class="user-list-section">
        <div class="user-list-header-container page-header-container">
            <h3>Dashboard</h3>
          </div>
        <div class="user-list-add-container text-right">
            <router-link :to="'user'" class="btn btn-primary">Add New User</router-link>
            <button type="button" v-on:click="deleteAllUser()" class="btn btn-primary">Delete All</button>
        </div>
        <div class="alert alert-success" role="alert" v-if="successMessage">
            {{ successMessage }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        <div class="alert alert-danger" role="alert" v-if="errorMessage">
            {{ errorMessage }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        <div class="user-list-table-container">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" class="text-center">
                    <input type="checkbox" name="listcheck" v-model="selectAll"/>
                  </th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="user in users">
                  <td class="text-center">
                    
                  <input type="checkbox" id="jack" :value="user.id" v-model="selected.user_id">
                  </td>
                  <td>{{ user.first_name }} {{ user.last_name }}</td>
                  <td>{{ user.email }}</td>
                  <td>{{ user.phone }}</td>
                  <td>
                    <router-link :to="{ name: 'update-user', params: { id: user.id }}" class="btn btn-primary">Edit</router-link>
                    <button type="button" v-on:click="deleteUser(user.id)" class="btn btn-primary">Delete</button>
                  </td>
                </tr>
                <tr v-if="users.length == 0">
                    <td colspan="5" class="text-center">No user found</td>
                </tr>
              </tbody>
            </table>
        </div>
    </section>
</template>

<script>

import auth from '../services/auth.js';
import users from '../services/users.js';

export default {
    mounted() {
        this.$nextTick(function () {
            auth.check();
        })

        users.fetch(this);
    },
    data() {
        return {
            users: [],
            errors: [],
            errorMessage: '',
            successMessage: '',
            selected: {
                user_id: []
            }
        };
    },
    methods: {
        deleteUser: function (id) {
            if ( confirm("Are you sure do you want to delete the selected user?") ) {
                users.delete(this, id);
            }
        },
        deleteAllUser: function () {
            if ( ( this.selected.user_id.length > 0 ) && confirm("Are you sure do you want to delete the selected user?") ) {
                users.deleteAll(this, this.selected);
            }
        },
        setErrors(response) {
            if( response.data.error ){
                this.errors = response.data.error;
            }
            this.errorMessage = response.data.message;
        }
    },
    computed: {
        selectAll: {
            get: function () {
                return this.users ? this.selected.user_id.length == this.users.length : false;
            },
            set: function (value) {
                var selected = [];

                if (value) {
                    this.users.forEach(function (user) {
                        selected.push(user.id);
                    });
                }

                this.selected.user_id = selected;
            }
        },
    }
}
</script>