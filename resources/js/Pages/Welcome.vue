<template>
    <div>
        <Step1 v-if="step === 1" @next="nextStep"/>
        <Step2 v-if="step === 2" @next="nextStep" @prev="prevStep"/>
        <Step3 v-if="step === 3" @next="nextStep" @prev="prevStep"/>
        <Step4 v-if="step === 4" @prev="prevStep"/>
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
        prevStep() {
            this.step--;
        },
    },
};
</script>
