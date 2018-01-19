import Vue from './../app.js';
import {router} from './../app.js';

export default {
    fetch(context) {

        axios.get('api/user')
                    .then(response => {
                        context.users = response.data.list;
                    })
                    .catch(({response}) => context.setErrors(response));
        
    }
}