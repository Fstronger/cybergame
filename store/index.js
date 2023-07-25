import { createStore } from 'vuex';

export default createStore({
    state: {
        registration: {
            name: '',
            faction: '',
            character: '',
        },
    },
    mutations: {
        SET_NAME(state, { firstName, lastName }) {
            state.registration.name = `${firstName} ${lastName}`;
        },
        SET_FACTION(state, faction) {
            state.registration.faction = faction;
        },
        SET_CHARACTER(state, character) {
            state.registration.character = character;
        },
        RESET_REGISTRATION(state) {
            state.registration = {
                name: '',
                faction: '',
                character: '',
            };
        },
    },
});
