<template>
    <button
        class="w-full h-[48px] flex justify-center items-center text-white text-18 font-bold bg-black-3 rounded-[8px]"
    >
        Cancel
    </button>
</template>

<script>
export default {
    props: {
        class: {
            type: String,
            required: false,
            default: "top",
        },

    },
};
</script>
