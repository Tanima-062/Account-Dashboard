<template>
    <div class="head mb-6">
        <h3 class="title font-bold text-base text-20 mb-4">Accounts</h3>
    </div>

    <div class="content mb-6">
        <Table>
            <template #head>
                <TableColumn
                    class="w-[90%]"
                >
                        Group Group Head
                </TableColumn>

                <TableColumn
                    class="w-[10%] pl-2"
                >
                    Total Amounts
                </TableColumn>
            </template>
            <template #body>
                <ReportBodyRow
                    v-for="group in groups"
                    :key="group.id"
                    :group="group"
                />
            </template>
        </Table>
    </div>

</template>

<script setup>
//compoents
import Table from "../../Components/Table/Table.vue"
import TableColumn from "../../Components/Table/TableColumn.vue"
import ReportBodyRow from "./components/ReportBodyRow.vue"


const props = defineProps({
    groups: {
        type: Object,
        required: true,
    }
});

</script>
