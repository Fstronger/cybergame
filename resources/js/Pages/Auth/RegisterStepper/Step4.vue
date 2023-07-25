<template>
    <div class="card" style="width: 30%; align-items: flex-start; gap: 16px;">

        <p style="color: white; ">Игрок <span style="color: mediumaquamarine">{{ name }}</span></p>
        <p style="color: white; ">Фракция <span style="color: mediumaquamarine">{{ faction }}</span></p>
        <p style="color: white; ">Персонаж <span style="color: mediumaquamarine">{{ character }}</span></p>

        <button class="btn btn--primary" @click="submit">Подтверждаю</button>
    </div>
</template>

<script>
export default {
    computed: {
        name() {
            return this.$store.state.registration.name;
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
    },
};
</script>
