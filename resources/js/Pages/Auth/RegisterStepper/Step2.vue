<template>
    <div style="display: flex; flex-direction: column; align-items: center;">
        <div style="display: flex; gap: 16px;">
            <div v-if="factions" v-for="faction in factions.data" :key="faction.id"
                 :class="['card', { 'isActive': selectedFaction === faction}]" style="width: 33%"
                 @click="selectFaction(faction)">

                <img class="card__img" :src="`images/${faction.image}.svg`" :alt="faction.name"/>

                <h3 class="card__title">{{ faction.name }}</h3>

                <p class="card__text">{{ faction.description }}</p>
            </div>

            <div class="card__text" v-else>Не удалось получить фракции</div>
        </div>

        <div class="btn-group">
            <button class="btn btn--no-bg" @click="prevStep">Назад</button>
            <button class="btn btn--primary" @click="nextStep" :disabled="!selectedFaction">Вперед</button>
        </div>
    </div>
</template>

<script>
import {mapActions, mapState} from 'vuex';

export default {
    data() {
        return {
            selectedFaction: null,
        };
    },
    computed: {
        ...mapState(['factions']),
    },
    methods: {
        selectFaction(faction) {
            this.selectedFaction = faction;
        },
        nextStep() {
            this.$store.commit('SET_FACTION', this.selectedFaction);
            this.$emit('next');
        },
        prevStep() {
            this.$emit('prev');
        },
        ...mapActions(['fetchFactions']),
    },
    emits: ['next', 'prev'],
    mounted() {
        this.fetchFactions();
    },
};
</script>
