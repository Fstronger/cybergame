import authApi from '/api/auth';

const state = {
    isSubmitting: false,
    currentUser: null,
    validationErrors: null,
    isLoggedIn: null,
};

const mutations = {
    registerStart(state) {
        state.isSubmitting = true;
        state.validationErrors = null;
        console.log('Попытка регистрации');
    },
    registerSuccess(state, payload) {
        state.isSubmitting = false;
        state.currentUser = payload;
        state.isLoggedIn = true;
        console.log('Успех');
    },
    registerFailure(state, payload) {
        state.isSubmitting = false;
        state.validationErrors = payload;
        console.log('Провал');
    },
};

const actions = {
    register(context, credentials) {
        return new Promise((resolve) => {
            context.commit('registerStart');
            authApi
                .register(credentials)
                .then((response) => {
                    console.log('response', response);
                    context.commit('registerSuccess', response.data.user);
                    resolve(response.data.user);
                })
                .catch((result) => {
                    context.commit('registerFailure', result.response.data.errors);
                    console.log('result errors', result);
                });
        });
    },
};

export default {
    state,
    actions,
    mutations,
};
