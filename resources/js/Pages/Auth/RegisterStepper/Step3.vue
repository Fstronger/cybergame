<template>
    <div style="display: flex; flex-direction: column; align-items: center;">
        <div style="display: flex; gap: 16px;">
            <div v-if="heroes"
                v-for="hero in heroes.data"
                :key="hero.id"
                :class="['card', { 'isActive': selectedHero === hero }]"
                style="width: 33%;"
                @click="selectHero(hero)"
            >
                <img class="card__img pers-img" :src="`images/${hero.image}.png`" :alt="hero.name"/>
                <h3 class="card__title">{{ hero.name }}</h3>
                <p class="card__text">{{ hero.description }}</p>

            </div>
            <div class="card__text" v-else>Не удалось получить фракции</div>
        </div>

        <div class="btn-group">
            <button class="btn btn--no-bg" @click="prevStep">Назад</button>
            <button class="btn btn--primary" @click="nextStep" :disabled="!selectedHero">Вперед</button>
        </div>

    </div>
</template>

<script>
import {mapActions, mapState} from 'vuex';

export default {
    data() {
        return {
            selectedHero: null,
        };
    },
    computed: {
        ...mapState(['heroes']),
    },
    methods: {
        selectHero(hero) {
            this.selectedHero = hero;
        },
        nextStep() {
            this.$store.commit('SET_CHARACTER', this.selectedHero);
            this.$emit('next');
        },
        prevStep() {
            this.$emit('prev');
        },
        ...mapActions(['fetchHeroes']),
    },
    emits: ['next', 'prev'],
    mounted() {
        this.fetchHeroes();
    },
};
</script>
