<script setup>

import SecondaryButton from '@/Components/SecondaryButton.vue';

defineProps({ factions: Object, getHeroes: Object })

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Второй шаг регистрации</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Выберите фракцию
            </p>
        </header>

        <div class="step-two">
            <ul class="p-6 text-gray-900 dark:text-gray-100" id="example-1">
                <li v-for="faction in factions" :key="faction.id">
                    <br>
                    {{ faction.name }}
                    <br>
                    <br>
                    {{ faction.description }}
                    <SecondaryButton @click="getHeroes(faction.id)"> Выбрать </SecondaryButton>
                </li>
            </ul>
        </div>
    </section>
</template>
