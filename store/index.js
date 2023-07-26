import { createStore } from 'vuex';

export default createStore({
    state: {
        registration: {
            authData: {
                name: '',
                mail: '',
                password: '',
                passwordConfirmation: '',
            },
            faction: {
                ID: '',
                name: ''
            },
            character: {
                ID: '',
                name: ''
            },
        },
    },
    mutations: {
        SET_AUTH(state, authData) {
            state.registration.auth = authData;
        },
        SET_FACTION(state, faction) {
            state.registration.faction = faction;
        },
        SET_CHARACTER(state, character) {
            state.registration.character = character;
        },
        RESET_REGISTRATION(state) {
            state.registration = {
                authData: '',
                faction: '',
                character: '',
            };
        },
    },
});
