<template>
    <div>
        <Step1 v-if="step === 1" @next="nextStep" />
        <Step2 v-if="step === 2" @next="nextStep" />
        <Step3 v-if="step === 3" @next="nextStep" />
        <Step4 v-if="step === 4" @next="resetStep" />
    </div>
</template>

<script>
import Step1 from './Auth/RegisterStepper/Step1.vue';
import Step2 from './Auth/RegisterStepper/Step2.vue';
import Step3 from './Auth/RegisterStepper/Step3.vue';
import Step4 from './Auth/RegisterStepper/Step4.vue';

export default {
    components: {
        Step1,
        Step2,
        Step3,
        Step4,
    },
    data() {
        return {
            step: 1,
        };
    },
    methods: {
        nextStep() {
            this.step++;
        },
        resetStep() {
            this.step = 1;
        },
    },
};
</script>
