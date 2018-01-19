<template>
    <section class="user-list-section">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" class="text-center"><input type="checkbox" name="listcheck" /></th>
              <th scope="col">Firs Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users">
              <td class="text-center"><input type="checkbox" name="listcheck" /></td>
              <td>{{ user.first_name }}</td>
              <td>{{ user.last_name }}</td>
              <td>{{ user.email }}</td>
              <td>{{ user.phone }}</td>
              <td>@mdo</td>
            </tr>
          </tbody>
        </table>
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
            errorMessage: ''
        };
    },
    methods: {
        fetch(response) {

            if( response.data.error ){
                this.errors = response.data.error;
            }

            this.errorMessage = response.data.message;

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