import { createStore } from 'vuex';
import axios from 'axios';
import {router} from "@inertiajs/vue3";

export default createStore({
    state: {
        registrationData: {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
        },
        selectedFaction: [],
        selectedCharacter: [],
        factions: [],
        characters: [],
    },

    //Меняем значения в стейте
    mutations: {
        //Грузим в стейт стора регистрационные данные
        GET_REGISTRATION_DATA(state, registrationData) {
            state.registrationData = registrationData;
        },

        //Сбрасываем форму регистрации
        RESET_REGISTRATION_DATA(state) {
            state.registrationData = {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            };
        },

        //Грузим в стейт стора список фракций
        GET_FACTIONS(state, factions) {
            state.factions = factions;
        },

        //Грузим в стейт стора список персонажей
        GET_CHARACTERS(state, characters) {
            state.characters = characters;
        },

        //Грузим в стейт стора список фракций
        GET_SELECTED_FACTION(state, selectedFraction) {
            state.selectedFaction = selectedFraction;
        },

        //Грузим в стейт стора список персонажей
        GET_SELECTED_CHARACTER(state, selectedCharacter) {
            state.selectedCharacter = selectedCharacter;
        },
    },

    //Асинхронне запросы к базе
    actions: {
        /**
         * Получаем список фракций из базы данных
         *
         * @param commit
         * @returns {Promise<void>}
         */
        async fetchFactions({ commit }) {
            try {
                const response = await axios.get('/factions'); // Здесь замените URL на ваш API
                commit('GET_FACTIONS', response.data);
            } catch (error) {
                console.error('Ошибка при выполнении запроса:', error);
            }
        },

        /**
         * Получаем список персонажей из базы данных
         *
         * @param commit
         * @returns {Promise<void>}
         */
        async fetchCharacters({ commit }) {
            try {
                const response = await axios.get(`/faction-heroes/${this.state.selectedFaction.id}`);
                commit('GET_CHARACTERS', response.data);
            } catch (error) {
                console.error('Ошибка при выполнении запроса:', error);
            }
        },

        async submitRegistrationData({ state }) {
            try {
                const response = await axios.post('/register', state.registrationData);
                // Здесь вы можете обработать ответ от сервера, если это необходимо
                console.log(response.data);
            } catch (error) {
                // Обработка ошибок, если что-то пошло не так при отправке данных
                console.error(error);
            }
        },
    },
});
