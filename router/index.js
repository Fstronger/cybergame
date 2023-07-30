import {createRouter, createWebHistory} from 'vue-router';
import Step2 from "/resources/js/Pages/Auth/RegisterStepper/Step2.vue";
import Welcome from "@/Pages/Welcome.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: '/welcome',
            component: Welcome,
        },
        {
            path: '/step2',
            name: 'step2',
            component: Step2,
        },
    ],
});

export default router;
