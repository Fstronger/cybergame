<template>
    <div style="display: flex; gap: 16px;">
        <div class="card" style="width: 30%; flex-shrink: 0; align-items: flex-start; gap: 16px;">

           <h2 class="card__text">Пользовательская часть</h2>

            <div class="card__line">
                <p class="card__text">Игрок</p>
                <h3 class="card__title">{{ auth.name }}</h3>
            </div>

            <div class="card__line">
                <p class="card__text">Почта</p>
                <h3 class="card__title">{{ auth.mail }}</h3>
            </div>

            <div class="card__line">
                <p class="card__text">Название фракции</p>
                <h3 class="card__title" style="display: flex; align-items: center;"> <img width="40" :src="faction.image" alt="">{{ faction.name }} ID-{{ faction.id }}</h3>

            </div>

            <div class="card__line">
                <p class="card__text">Название фракции</p>
                <h3 class="card__title">{{ character.name }} ID-{{ character.id }}</h3>
                <br>
                <img width="80" :src="character.image" alt="">
            </div>
        </div>

        <div class="card" style="color: aquamarine; align-items: flex-start">
            <h2 class="card__text">Админская часть</h2>
            <br><br>

            {{ auth }}
            <br><br><br>
            {{ faction }}
            <br><br><br>
            {{ character }}
        </div>
    </div>

    <div class="btn-group">
        <button class="btn btn--no-bg" @click="prevStep">Назад</button>
        <button class="btn btn--primary" @click="submit">Подтверждаю</button>
    </div>
</template>

<script>
export default {
    computed: {
        auth() {
            return this.$store.state.registration.auth;
        },
        faction() {
            return this.$store.state.registration.faction;
        },
        character() {
            return this.$store.state.registration.character;
        },
    },
    methods: {
        submit() {
            // Здесь вы можете отправить данные на сервер или выполнить другие действия
            alert('Добро пожаловать в ад!'); // Вместо этого можно отправить данные на сервер
            this.$store.commit('RESET_REGISTRATION');
            this.$emit('next');
        },
        prevStep() {
            this.$emit('prev');
        },
    },
};

</script>
