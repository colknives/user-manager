import Vue from './../app.js';
import {router} from './../app.js';

export default {
    check() {
        
        let token = localStorage.getItem('token');
        if (token == null) {
            
            router.push({
                name: 'login'
            })

            router.go();
        }

    },
    login(context, login) {

        axios.post('api/login', login)
                    .then(response => {

                        localStorage.setItem('token', response.data.accessToken);
                        localStorage.setItem('info', response.data.info);

                        router.push({
                            name: 'dashboard'
                        })

                        router.go();

                    })
                    .catch(({response}) => context.setErrors(response));
        
    },
    logout() {
        
        localStorage.removeItem('token');
        localStorage.removeItem('info');

    }
}