import Vue from './../app.js';
import {router} from './../app.js';
import {headers} from './../app.js';

export default {
    fetch(context) {

        axios.get('api/user',{
            headers: headers
        })
        .then(response => {
            context.users = response.data.list;
        })
        .catch(({response}) => context.setErrors(response));
        
    },
    find(context, id) {

        axios.get('api/user/'+id,{
            headers: headers
        })
        .then(response => {
            context.user = response.data.user;
        })
        .catch(response => {

            router.push({
                name: 'add-user'
            })

            router.go();

        });
        
    },
    add(context, user) {

        axios.post('api/user', user,{
            headers: headers
        })
        .then(response => {

            router.push({
                name: 'dashboard'
            })

            router.go();

        })
        .catch(({response}) => context.setErrors(response));

    },
    update(context, id, user) {

        axios.patch('api/user/'+id, user,{
            headers: headers
        })
        .then(response => {

            router.push({
                name: 'dashboard'
            })

            router.go();

        })
        .catch(({response}) => context.setErrors(response));

    },
    delete(context, id) {

        axios.delete('api/user/'+id,{
            headers: headers
        })
        .then(response => {
            context.users = response.data.list;
            context.successMessage = response.data.message;
        })
        .catch(({response}) => context.setErrors(response));

    },
    deleteAll(context, selected) {

        axios.post('api/user/delete', selected,{
            headers: headers
        })
        .then(response => {
            context.users = response.data.list;
            context.successMessage = response.data.message;
        })
        .catch(({response}) => context.setErrors(response));

    }
}