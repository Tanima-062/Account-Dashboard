<template>
    <div
        class="flex flex-col ml-auto mt-4 mr-[30px] pt-8 pl-8 pr-8 pb-6 bg-white h-max rounded-[16px] shadow-form"
        :class="className"
        :style="styles"
    >

        <div class="heading flex justify-between items-center flex-row mb-[18px]">
            <h1 class="title text-[#7059E2] font-bold text-20">{{ title }}</h1>
            <span
                class="close cursor-pointer"
                @click="$emit('hide')"
            >
                <Cross />
            </span>
        </div>
        <p class="message text-base">{{ message }}</p>
    </div>
</template>


<script setup>
import { computed, toRaw } from "@vue/runtime-core";
import Cross from "../../Icons/CrossIcon.vue";

const props = defineProps({
    title: {
        type: String,
        required: false,
        default: "Notification",
    },
    className: {
        type: String,
        required: false,
        default: "top w-600",
    },

    styles: {
        type: Object,
        required: false,
    },

    message: {
        type: String,
        required: false,
        default: "Hello There!",
    },
});
</script>

<script>
export default {
    inheritAttrs: false,
};
</script>
