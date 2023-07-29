<template>
    <div style="display: flex; flex-direction: column; align-items: center;">
        <div style="display: flex; gap: 16px;">
            <div v-if="characters"
                 v-for="character in characters.data"
                 :key="character.id"
                 :class="['card', { 'isActive': selectedCharacter === character }]"
                 style="width: 33%; flex-direction: row"
                 @click="selectCharacter(character)"
            >

                <div style="margin-right: 16px;">
                    <img class="card__img pers-img" :src="`images/${character.image}.png`" :alt="character.name"/>
                </div>
                <div>
                    <h3 class="card__title">{{ character.name }}</h3>
                    <ul class="pers-stats">
                        <li class="pers-stats__item" v-for="characteristic in character.characteristics">
                            <span class="pers-stats__label">{{ characteristic.name }} - {{characteristic.amount}}</span>
                            <ProgressBar :cellCount="characteristic.amount / 10"/>
                        </li>
                    </ul>
                    <p class="card__text">{{ character.description }}</p>
                </div>
            </div>
            <div class="card__text" v-else>Не удалось получить фракции</div>
        </div>

        <div class="btn-group">
            <button class="btn btn--no-bg" @click="prevStep">Назад</button>
            <button class="btn btn--primary" @click="nextStep" :disabled="!selectedCharacter">Вперед</button>
        </div>
    </div>
</template>

<script>
import {mapActions, mapState} from 'vuex';
import ProgressBar from "@/Components/ProgressBar.vue";

export default {
    components: {ProgressBar},
    data() {
        return {
            selectedCharacter: null,
        };
    },
    computed: {
        ...mapState(['characters']),
    },
    methods: {
        selectCharacter(selectedCharacter) {
            this.selectedCharacter = selectedCharacter;
        },
        nextStep() {
            this.$store.commit('GET_SELECTED_CHARACTER', this.selectedCharacter);
            this.$emit('next');
        },
        prevStep() {
            this.$emit('prev');
        },
        ...mapActions(['fetchCharacters']),
    },
    emits: ['next', 'prev'],
    mounted() {
        this.fetchCharacters();
    },
};
</script>
