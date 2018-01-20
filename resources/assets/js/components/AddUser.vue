<template>
    <section class="add-user-section">
      <div class="add-user-header-container page-header-container">
        <h3>Add User</h3>
      </div>
      <div class="user-form-container">
        <form method="POST">
          <div class="alert alert-danger" role="alert" v-if="errorMessage">
            {{ errorMessage }}
          </div>
          <div class="form-group row">
              <div class="col-md-12">
                <label>Username</label>
                <input v-model="user.username" type="text" class="form-control" name="username" placeholder="Enter Username" />
                <span v-if="errors.username" class="help-block text-danger error-field-message">{{ errors.username[0] }}</span>
              </div>
          </div>
          <div class="form-group row">
              <div class="col-md-6">
                <label>Password</label>
                <input v-model="user.password" type="password" class="form-control" name="password" placeholder="Enter Password">
                <span v-if="errors.password" class="help-block text-danger error-field-message">{{ errors.password[0] }}</span>
              </div>
              <div class="col-md-6">
                <label>Confirm Password</label>
                <input v-model="user.password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                <span v-if="errors.password_confirmation" class="help-block text-danger error-field-message">{{ errors.password_confirmation[0] }}</span>
              </div>
          </div>
          <div class="form-group row">
              <div class="col-md-6">
                <label>First Name</label>
                <input v-model="user.first_name" type="text" class="form-control" name="first_name" placeholder="Enter First Name">
                <span v-if="errors.first_name" class="help-block text-danger error-field-message">{{ errors.first_name[0] }}</span>
              </div>
              <div class="col-md-6">
                <label>Last Name</label>
                <input v-model="user.last_name" type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
                <span v-if="errors.last_name" class="help-block text-danger error-field-message">{{ errors.last_name[0] }}</span>
              </div>
          </div>
          <div class="form-group row">
              <div class="col-md-6">
                <label>Email</label>
                <input v-model="user.email" type="text" class="form-control" name="email" placeholder="Enter Email">
                <span v-if="errors.email" class="help-block text-danger error-field-message">{{ errors.email[0] }}</span>
              </div>
              <div class="col-md-6">
                <label>Phone</label>
                <input v-model="user.phone" type="text" class="form-control" name="phone" placeholder="Enter Phone">
                <span v-if="errors.phone" class="help-block text-danger error-field-message">{{ errors.phone[0] }}</span>
              </div>
          </div>
          <div class="form-group row">
              <div class="col-md-12">
                <label>Address</label>
                <textarea v-model="user.address" class="form-control" name="address" placeholder="Enter Address"></textarea>
                <span v-if="errors.address" class="help-block text-danger error-field-message">{{ errors.address[0] }}</span>
              </div>
          </div>
          <div class="form-group row">
              <div class="col-md-12">
                <label>Post Code</label>
                <input v-model="user.postcode" type="text" class="form-control" name="postcode" placeholder="Enter Post Code" />
                <span v-if="errors.postcode" class="help-block text-danger error-field-message">{{ errors.postcode[0] }}</span>
              </div>
          </div>
          <div class="form-actions">
              <div class="form-group row">
                  <div class="col-md-12 user-submit-container">
                      <router-link :to="'dashboard'" class="btn btn-light">Cancel</router-link>
                      <button type="button" v-on:click="submit" class="btn btn-primary">Add User</button>
                  </div>
              </div>
          </div>
        </form>
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

    },
    data() {
        return {
            errors: [],
            errorMessage: '',
            user: {
                username: '',
                password: '',
                password_confirmation: '',
                first_name: '',
                last_name: '',
                email: '',
                address: '',
                postcode: '',
                phone: '',
                username: '',
                lastname: ''
            }
        };
    },
    methods: {
      submit(){

        users.add(this, this.user);

      },
      setErrors(response) {

          if( response.data.error ){
              this.errors = response.data.error;
          }

          this.errorMessage = response.data.message;

      }
    }
}
</script>