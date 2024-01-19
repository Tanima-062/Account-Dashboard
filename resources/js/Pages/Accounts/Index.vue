<template>
    <div class="head mb-6">
        <h3 class="title font-bold text-base text-20 mb-4">Accounts</h3>
        <div class="wrapper flex justify-end">
            <PrimaryButton
                class="text-white font-montserrat font-bold text-18"
                @click="Inertia.visit(route('accounts.create'))"
            >Add Account</PrimaryButton>
        </div>
    </div>

    <div class="content mb-6">
        <Table>
            <template #head>
                <TableColumn
                    class="w-[20%]"
                    routeName="products.index"
                    columnName="prefix_id"
                >
                        Acc Head ID
                </TableColumn>

                 <TableColumn
                    class="w-[10%] pl-2"
                    routeName="products.index"
                    columnName="serial_number"
                >
                    G. Lvl 1
                </TableColumn>

                <TableColumn
                    class="w-[10%] pl-2"
                    routeName="products.index"
                    columnName="name"
                >
                    G. Lvl 2
                </TableColumn>

                <TableColumn
                    class="w-[10%] pl-2"
                    routeName="products.index"
                    columnName="supplier"
                >
                    G. Lvl 3
                </TableColumn>

                <TableColumn
                    class="w-[25%] pl-2"
                    routeName="products.index"
                    columnName="category"
                >
                   Acc Head
                </TableColumn>
                <TableColumn
                    class="w-[25%] pl-2"
                    routeName="products.index"
                    columnName="company"
                >
                    Total
                </TableColumn>
            </template>
            <template #body>
                <TableBodyRow
                    v-for="account in accounts.data"
                    :key="account.id"
                    :account="account"
                />
            </template>
        </Table>
    </div>

    <div class="footer flex gap-[163px]">
        <PerPage :route-name="'accounts.index'" />
        <Pagination :paginationData="accounts" />
    </div>
</template>

<script setup>
import { inject, watch, onMounted } from "vue";
//compoents
import Table from "../../Components/Table/Table.vue"
import TableColumn from "../../Components/Table/TableColumn.vue"

//libs
import { Inertia } from "@inertiajs/inertia";
import TableBodyRow from "./components/TableBodyRow.vue"
import PerPage from "../../Components/Table/PerPage.vue"
import Pagination from "../../Components/Pagination.vue"
import PrimaryButton from "../../Components/PrimaryButton.vue"
import FlashNotification from "../../Components/Modal/Content/FlashNotification.vue";
import { usePage } from "@inertiajs/inertia-vue3";
import axios from "axios"


const props = defineProps({
    accounts: {
        type: Object,
        required: true,
    }
});

</script>
