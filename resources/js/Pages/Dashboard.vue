<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, usePage} from '@inertiajs/vue3';


defineProps({ factions: Object })
</script>

<template>
    <Head title="Обзорная" />

    <AuthenticatedLayout>
        <div class="card" style="width: 24%;">
            <h2 class="card__title">Информация о фракциях</h2>

            <ul class="card__list">
                <li v-for="faction in factions" :key="faction.id">
                    {{ faction.name }}
                    {{ faction.description }}
                </li>
            </ul>
        </div>
    </AuthenticatedLayout>
</template>
