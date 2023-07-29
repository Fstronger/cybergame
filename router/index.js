
import {createRouter, createWebHistory} from 'vue-router';
import Success from "@/Pages/Auth/Success.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'Success',
            component: Success,
        },
        // {
        //     path: '/success',
        //     name: 'success',
        //     component: Success,
        // },
    ],
});

export default router;
