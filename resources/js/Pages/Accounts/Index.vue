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
                >
                        Acc Head ID
                </TableColumn>

                 <TableColumn
                    class="w-[10%] pl-2"
                >
                    G. Lvl 1
                </TableColumn>

                <TableColumn
                    class="w-[10%] pl-2"
                >
                    G. Lvl 2
                </TableColumn>

                <TableColumn
                    class="w-[10%] pl-2"
                >
                    G. Lvl 3
                </TableColumn>

                <TableColumn
                    class="w-[25%] pl-2"
                >
                   Acc Head
                </TableColumn>
                <TableColumn
                    class="w-[25%] pl-2"
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
//compoents
import Table from "../../Components/Table/Table.vue"
import TableColumn from "../../Components/Table/TableColumn.vue"

//libs
import { Inertia } from "@inertiajs/inertia";
import TableBodyRow from "./components/TableBodyRow.vue"
import PerPage from "../../Components/Table/PerPage.vue"
import Pagination from "../../Components/Pagination.vue"
import PrimaryButton from "../../Components/PrimaryButton.vue"


const props = defineProps({
    accounts: {
        type: Object,
        required: true,
    }
});

</script>
