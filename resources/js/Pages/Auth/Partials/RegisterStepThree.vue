<script setup>

import SecondaryButton from '@/Components/SecondaryButton.vue';

defineProps({ heroes: Object })

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Третий шаг регистрации</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Выберите фракцию
            </p>
        </header>

        <div class="step-two">
            <ul class="p-6 text-gray-900 dark:text-gray-100" id="example-1">
                <li v-for="hero in heroes.data" :key="hero.id">
                    <br>
                    {{ hero.name }}
                    <br>
                    <br>
                    {{ hero.description }}
                    <li v-for="char in hero.characteristics" :key="hero.id">
                        <br>
                        {{ char.name }}
                        <br>
                        <br>
                        {{ char.amount }}
                    </li>
                </li>
            </ul>
        </div>
    </section>
</template>
