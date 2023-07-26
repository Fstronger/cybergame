<template>
    <div>

        <div class="form-group">
            <label class="form-group__label" for="name">Имя</label>
            <input class="input" type="text" id="name" v-model="name" />
        </div>

        <div class="form-group">
            <label class="form-group__label" for="mail">Почта</label>
            <input class="input" type="email" id="mail" v-model="mail" />
        </div>

        <div class="form-group">
            <label class="form-group__label" for="password">Пароль</label>
            <input class="input" type="password" id="password" v-model="password" />
        </div>

        <div class="form-group">
            <label class="form-group__label" for="passwordConfirmation">Подтверждение пароля</label>
            <input class="input" type="password" id="passwordConfirmation" v-model="passwordConfirmation" />
        </div>

        <button class="btn btn--primary" @click="nextStep">Next</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            mail: '',
            password: '',
            passwordConfirmation: ''
        };
    },
    methods: {
        nextStep() {
            this.$store.commit('SET_AUTH', {
                name: this.name,
                mail: this.mail,
                password: this.password,
                passwordConfirmation: this.passwordConfirmation,
            });
            this.$emit('next');
        },
    },
};
</script>
