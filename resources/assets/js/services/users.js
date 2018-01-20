import Vue from './../app.js';
import {router} from './../app.js';

export default {
    fetch(context) {

        axios.get('api/user')
                    .then(response => {
                        context.users = response.data.list;
                    })
                    .catch(({response}) => context.setErrors(response));
        
    },
    find(context, id) {

        axios.get('api/user/'+id)
                    .then(response => {
                        context.user = response.data.user;

                        // console.log(response);

                    })
                    .catch(response => {

                        router.push({
                            name: 'add-user'
                        })

                        router.go();

                    });
        
    },
    add(context, user) {

        axios.post('api/user', user)
                    .then(response => {

                        router.push({
                            name: 'dashboard'
                        })

                        router.go();

                    })
                    .catch(({response}) => context.setErrors(response));

    },
    update(context, id, user) {

        axios.patch('api/user/'+id, user)
                    .then(response => {

                        router.push({
                            name: 'dashboard'
                        })

                        router.go();

                    })
                    .catch(({response}) => context.setErrors(response));

    },
    delete(context, id) {

        axios.delete('api/user/'+id)
                    .then(response => {
                        context.users = response.data.list;
                        context.successMessage = response.data.message;
                    })
                    .catch(({response}) => context.setErrors(response));

    },
    deleteAll(context, selected) {

        axios.post('api/user/delete', selected)
                    .then(response => {
                        console.log(response.data);
                        context.users = response.data.list;
                        context.successMessage = response.data.message;
                    })
                    .catch(({response}) => context.setErrors(response));

    }
}