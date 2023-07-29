<template>
    <div class="progress-bar" :style="`--cell-count:${cellCount}`">
        <div class="progress-bar__track">
            <div v-for="cell in 10" :key="cell" class="progress-bar__cell" ></div>
        </div>
    </div>
</template>>

<script>
export default  {
    name: 'ProgressBar',
    props: {
        cellCount: {
            type: Number,
            required: true,
        },
    },
}
</script>
