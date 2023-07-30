<template>
    <div>
        <div class="form-group">
            <label class="form-group__label" for="name">Введите Ник</label>
            <input class="input" type="text" id="name" v-model="name"/>
        </div>

        <div class="form-group">
            <label class="form-group__label" for="email">Введите email</label>
            <input class="input" type="email" id="email" v-model="email"/>
        </div>

        <div class="form-group">
            <label class="form-group__label" for="password">Введите пароль</label>
            <input class="input" type="password" id="password" v-model="password"/>
        </div>

        <div class="form-group">
            <label class="form-group__label" for="password_confirmation">Подтверждение пароля</label>
            <input class="input" type="password" id="password_confirmation" v-model="password_confirmation"/>
        </div>
        <div class="btn-group btn-group--center">
             <button class="btn btn--primary" @click="onSubmit">Вперед</button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Register',
    data() {
        return {
            email: '',
            name: '',
            password: '',
            password_confirmation: '',
            isHide: false
        }
    },
    methods: {
        onSubmit() {
            console.log('Отправка формы');
            this.$store
                .dispatch('register', {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                })
                .then(() => {
                    console.log('Успешная регистрация');
                    this.$emit('next');
                })
        }
    }
}
</script>
