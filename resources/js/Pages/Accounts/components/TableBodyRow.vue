<template>
    <div class="table-body-row flex items-center py-4 px-1">
        <div class="column w-[20%] text-base text-18">
            {{ account.id }}
        </div>
        <div class="column w-[10%] text-base text-18 pl-2">
            {{ account.group_1 }}
        </div>
        <div class="column w-[10%] text-base text-18 pl-2">
            {{ account.group_2 }}
        </div>
        <div class="column w-[10%] text-base text-18 pl-2">
            {{ account.group_3 }}
        </div>
        <div class="column w-[25%] text-base text-18 pl-2">
            {{ account.title }}
        </div>
        <div class="column w-[25%] text-base text-18 pl-2">
            {{ account.debit-account.credit }}
        </div>
    </div>
</template>

<script setup>


const props = defineProps({
    account: {
        type: Object,
        required: true,
    }
})

</script>
