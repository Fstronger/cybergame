import {createStore} from 'vuex';
import axios from 'axios';

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
        factions: null,
        heroes: null,
    },
    mutations: {
        /**
         * Получаем фракции из бд
         *
         * @param state
         * @param payload
         * @constructor
         */
        GET_FACTIONS(state, payload) {
            state.factions = payload;
        },

        /**
         * Получаем персонажей из бд
         *
         * @param state
         * @param payload
         * @constructor
         */
        GET_HEROES(state, payload) {
            state.heroes = payload;
        },

        /**
         * Забираем авторизационные данные из формы регистрации
         *
         * @param state
         * @param authData
         * @constructor
         */
        SET_AUTH(state, authData) {
            state.registration.auth = authData;
        },

        /**
         * Забираем выбранную фракцию
         *
         * @param state
         * @param faction
         * @constructor
         */
        SET_FACTION(state, faction) {
            state.registration.faction = faction;
        },

        /**
         * Забираем выбранного персонажа
         *
         * @param state
         * @param character
         * @constructor
         */
        SET_CHARACTER(state, character) {
            state.registration.character = character;
        },

        /**
         * Обнуление стора регистрации, хз может пригодится
         *
         * @param state
         * @constructor
         */
        RESET_REGISTRATION(state) {
            state.registration = {
                authData: '',
                faction: '',
                character: '',
            };
        },
    },
    actions: {
        /**
         * Получаем список фракций из бд
         *
         * @param commit
         * @returns {Promise<void>}
         */
        async fetchFactions({commit}) {
            try {
                const response = await axios.get('/factions'); // Здесь замените URL на ваш API
                commit('GET_FACTIONS', response.data);
            } catch (error) {
                console.error('Ошибка при выполнении запроса:', error);
            }
        },

        /**
         * Получаем список персонажей из бд
         *
         * @param commit
         * @returns {Promise<void>}
         */
        async fetchHeroes({commit}) {
            try {
                const response = await axios.get(`/faction-heroes/1`);
                commit('GET_HEROES', response.data);
            } catch (error) {
                console.error('Ошибка при выполнении запроса:', error);
            }
        },
    },
});
