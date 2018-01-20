<template>
    <section class="login-section">
        <div class="login-container">
            <div class="login-header-container">
                <h1><span class="logo-user">USER</span> <span class="logo-manager">MANAGER</span></h1>
            </div>
            <div class="login-form-container">
                <form method="POST">
                    <div class="login-form-header">
                        <h3>Sign-in</h3>
                    </div>
                    <div class="alert alert-danger" role="alert" v-if="errorMessage">
                      {{ errorMessage }}
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input v-model="login.username" type="text" class="form-control" name="username" placeholder="Username">
                            <span v-if="errors.username" class="help-block text-danger error-field-message">{{ errors.username[0] }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input v-model="login.password" type="password" class="form-control" name="password" placeholder="Password">
                            <span v-if="errors.password" class="help-block text-danger error-field-message">{{ errors.password[0] }}</span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="form-group row">
                            <div class="col-md-12 login-submit-container">
                                <button type="button" v-on:click="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script>

import auth from '../services/auth.js';

export default {
    data() {
        return {
            errors: [],
            errorMessage: '',
            login: {
                username: '',
                password: ''
            }
        };
    },
    methods: {
        submit: function (event) {
            this.errorMessage = '';
            this.errors = [];

            auth.login(this, this.login);

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
