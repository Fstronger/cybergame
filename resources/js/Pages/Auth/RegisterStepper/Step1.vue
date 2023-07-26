<template>
    <div>
        <div class="form-group">
            <label class="form-group__label" for="firstName">Имя</label>
            <input class="input" type="text" id="firstName" v-model="firstName" />
        </div>

        <div class="form-group">
            <label class="form-group__label" for="lastName">Фамилия</label>
            <input class="input" type="text" id="lastName" v-model="lastName" />
        </div>


        <button class="btn btn--primary" @click="nextStep">Next</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            firstName: '',
            lastName: '',
        };
    },
    methods: {
        nextStep() {
            this.$store.commit('SET_NAME', {
                firstName: this.firstName,
                lastName: this.lastName,
            });
            this.$emit('next');
        },
    },
};
</script>
