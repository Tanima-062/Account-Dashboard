<template>
    <div class="table-body-row flex items-center py-4 px-1">
        <div class="column w-[90%] text-base text-18">
            {{ group.title }}
        </div>
        <div class="column w-[10%] text-base text-18 pl-2">
            {{ group.total_amount }}
        </div>
    </div>
    
    <div class="table-body-row flex items-center py-4 px-1" v-if="group.children.length > 0">
        <div class="column w-[30%] text-base text-18">
  
        </div>
        <div class="column w-[30%] text-base text-18">
            {{ group.children[0].title }}
        </div>
        <div class="column w-[30%] text-base text-18">
            
        </div>
        <div class="column w-[10%] text-base text-18 pl-2">
            {{ group.children[0].total_amount }}
        </div>
    </div>
    <div class="table-body-row flex items-center py-4 px-1" v-if="group.children.length > 1">
        <div class="column w-[30%] text-base text-18">
            
        </div>
        <div class="column w-[30%] text-base text-18">
            
        </div>
        <div class="column w-[30%] text-base text-18">
            {{ group.children[1].title }} 
        </div>
        <div class="column w-[10%] text-base text-18 pl-2">
            {{ group.children[1].total_amount }}
        </div>
    </div>
    <div v-if="group.children.length > 1 && group.children[1].accounts.length > 0">
        <div class="table-body-row flex items-center py-4 px-1" v-for="account in group.children[1].accounts" :key="account.id" :account="account">
            <div class="column w-[30%] text-base text-18">
                
            </div>
            <div class="column w-[30%] text-base text-18">
                
            </div>
            <div class="column w-[30%] text-base text-18">
                {{ account.title }}
            </div>
            <div class="column w-[10%] text-base text-18 pl-2">
                {{ account.debit + account.credit }}
            </div>
        </div>
    </div>
    <div v-if="group.children.length > 0 && group.children.accounts.length > 0">
        <div class="table-body-row flex items-center py-4 px-1" v-for="account in group.children[0].accounts" :key="account.id" :account="account">
            <div class="column w-[30%] text-base text-18">
                
            </div>
            <div class="column w-[30%] text-base text-18">
                {{ account.title }}
            </div>
            <div class="column w-[30%] text-base text-18">
    
            </div>
            <div class="column w-[10%] text-base text-18 pl-2">
                {{ account.debit + account.credit }}
            </div>
        </div>
    </div>
    <div v-if="group.accounts.length > 0">
        <div class="table-body-row flex items-center py-4 px-1" v-for="account in group.accounts" :key="account.id" :account="account">
            <div class="column w-[30%] text-base text-18">
                {{ account.title }}
            </div>
            <div class="column w-[30%] text-base text-18">
                
            </div>
            <div class="column w-[30%] text-base text-18">
    
            </div>
            <div class="column w-[10%] text-base text-18 pl-2">
                {{ account.debit + account.credit }}
            </div>
        </div>
    </div>
</template>

<script setup>

const props = defineProps({
    group: {
        type: Object,
        required: true,
    }
});

const hasChild = (group)=>{
    console.log(group.children)
}

</script>
