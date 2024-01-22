<template>
    <div class="table-body-row flex items-center py-4 px-1">
        <div class="column w-[20%] text-base text-18">
            {{ account.id }}
        </div>
        <div class="column w-[10%] text-base text-18 pl-2">
            <!-- {{ account.group.parent == null ? account.group.title }} -->
            {{ group1 }} 
        </div>
        <div class="column w-[10%] text-base text-18 pl-2">
            {{ group2 }}
        </div>
        <div class="column w-[10%] text-base text-18 pl-2">
            {{ group3 }}
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

import { ref, onMounted } from "vue";

const group1 = ref(null);
const group2 = ref(null);
const group3 = ref(null);

const props = defineProps({
    account: {
        type: Object,
        required: true,
    }
});

onMounted(() => {
    if(props.account.group.parent == undefined){
        group1.value = props.account.group.title
    }else if(props.account.group.parent.parent == undefined){
        group1.value = props.account.group.parent.title
        group2.value = props.account.group.title
    }else if(props.account.group.parent.parent.parent == undefined){
        group1.value = props.account.group.parent.parent.title
        group2.value = props.account.group.parent.title
        group3.value = props.account.group.title
    }
})

</script>
