<script setup>
import RegisterStepOne from './Partials/RegisterStepOne.vue';
import RegisterStepTwo from './Partials/RegisterStepTwo.vue';
import RegisterStepThree from './Partials/RegisterStepThree.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import TextInput from "@/Components/TextInput.vue";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    factionIdInput: '',
});

defineProps({ factions: Object})

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<script>
export default {
    data() {
        return {
            heroes: {},
            factionIdInput: ''
        };
    },
    methods: {
        async getHeroes(factionId) {
            try {
                const response = await axios.get(`/faction-heroes/${factionId}`);
                this.heroes = response.data;
                this.factionIdInput = factionId;
            } catch (error) {
                console.error("Ошибка при загрузке данных:", error);
            }
        }
    }
};

</script>

<template>
    <GuestLayout>
        <Head title="Регистрация" />

        <form @submit.prevent="submit">
<!-- Начало Регистрация первый шаг-->
            <RegisterStepOne class="max-w-xl" />
<!-- Конец Регистрация первый шаг-->

<!-- Начало Регистрация второй шаг-->
            <RegisterStepTwo
                :factions="factions"
                :getHeroes="getHeroes"
                class="max-w-xl"
            />
<!-- Конец Регистрация второй шаг-->

<!-- Начало Регистрация третий шаг-->
            <RegisterStepThree
                :heroes="heroes"
                class="max-w-xl"
            />
<!-- Конец Регистрация третий шаг-->
            <TextInput
                id="factionIdInput"
                type="text"
                class="mt-1 block w-full"
                style="display: none"
                v-model="factionIdInput"
                required
            />

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                >
                    Уже зарегистрированы?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Зарегистрироваться
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
