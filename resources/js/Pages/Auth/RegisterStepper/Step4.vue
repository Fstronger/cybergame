<template>
    <div style="display: flex; gap: 16px; justify-content: center;">
        <div class="card" style="width: 30%; flex-shrink: 0; align-items: flex-start; gap: 16px;">

           <h2 class="card__text">Пользовательская часть</h2>

            <div class="card__line">
                <p class="card__text">Игрок</p>
                <h3 class="card__title">{{ registrationData.name }}</h3>
            </div>

            <div class="card__line">
                <p class="card__text">Почта</p>
                <h3 class="card__title">{{ registrationData.mail }}</h3>
            </div>

            <div class="card__line">
                <p class="card__text">Название фракции</p>
                <h3 class="card__title" style="display: flex; align-items: center;"> <img width="40" :src="`images/${selectedFaction.image}.svg`" alt="">
                    {{ selectedFaction.name }} ID-{{ selectedFaction.id }}</h3>
            </div>

            <div class="card__line">
                <p class="card__text">Название перса</p>
                <h3 class="card__title">{{ selectedCharacter.name }} ID-{{ selectedCharacter.id }}</h3>
                <br>
                <img width="80" :src="`images/${selectedCharacter.image}.png`" alt="">
            </div>
        </div>

        <div class="card" style="width: 70%; color: aquamarine; align-items: flex-start">
            <h2 class="card__text">Админская часть</h2>
            <br><br>
            {{ registrationData }}
            <br><br><br>
            {{ selectedFaction.id }}
            {{ selectedFaction.name }}
            <br><br><br>
            {{ selectedCharacter.id }}
            {{ selectedCharacter.name }}
        </div>
    </div>

    <div class="btn-group btn-group--center">
        <button class="btn btn--no-bg" @click="prevStep">Назад</button>
        <button class="btn btn--primary" @click="submit">Подтверждаю</button>
    </div>
</template>

<script>
export default {
    //Получаем мз стора итоговый
    computed: {
        registrationData() {
            return this.$store.state.registrationData;
        },
        selectedFaction() {
            return this.$store.state.selectedFaction;
        },
        selectedCharacter() {
            return this.$store.state.selectedCharacter;
        },
    },
    methods: {
        submit() {
            alert('Добро пожаловать в ад!');
            this.$store.commit('RESET_REGISTRATION');
            this.$emit('next');
        },
        prevStep() {
            this.$emit('prev');
        },
    },
    emits: ['next', 'prev'],
};

</script>
