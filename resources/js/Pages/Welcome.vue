<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div v-if="canLogin">
        <Link
            v-if="$page.props.auth.user"
            :href="route('dashboard')"
        >Dashboard</Link
        >

        <template v-else>
            <Link
                :href="route('login')"
            >Log in</Link
            >

            <Link
                v-if="canRegister"
                :href="route('register')"
            >Register</Link
            >
        </template>
    </div>

</template>
