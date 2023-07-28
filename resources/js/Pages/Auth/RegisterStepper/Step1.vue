<template>
    <div>
        <div class="form-group">
            <label class="form-group__label" for="name">Имя</label>
            <input class="input" type="text" id="name" v-model="name"/>
        </div>

        <div class="form-group">
            <label class="form-group__label" for="email">Почта</label>
            <input class="input" type="email" id="email" v-model="email"/>
        </div>

        <div class="form-group">
            <label class="form-group__label" for="password">Пароль</label>
            <input class="input" type="password" id="password" v-model="password"/>
        </div>

        <div class="form-group">
            <label class="form-group__label" for="password_confirmation">Подтверждение пароля</label>
            <input class="input" type="password" id="password_confirmation" v-model="password_confirmation"/>
        </div>
        <div class="btn-group btn-group--center">
            <button class="btn btn--primary" @click="nextStep">Вперед</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        };
    },
    methods: {
        nextStep() {
            this.$store.commit('GET_REGISTRATION_DATA', {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
            });
            this.$emit('next');
        },
    },
};
</script>
