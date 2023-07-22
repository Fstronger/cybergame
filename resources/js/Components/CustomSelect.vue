<template>
    <div :class="['custom-select', {'is-open' : showDropdown }]" @click="toggleDropdown">
        <div class="custom-select__input">{{ selectedOption }}</div>
        <div v-if="showDropdown" class="custom-select__options">
            <div
                v-for="(option, index) in options"
                :key="index"
                class="custom-select__option"
                @click="selectOption(option)"
            >
                {{ option }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        options: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            showDropdown: false,
            selectedOption:  null,
            isOpen: false
        };
    },
    methods: {
        toggleDropdown() {
            this.showDropdown = !this.showDropdown;
        },
        selectOption(option) {
            this.selectedOption = option;
        },
    },
};
</script>
