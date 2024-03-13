<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Заказы</h1>
        </div>
        <data-table
            viewRoute="admin.order"
            :columns="columns"
            :limits="limits"
            event="order"
            url="api.admin.orders"
        ></data-table>
    </div>
</template>
<script>
import AdminLayout from "@/Pages/components/AdminLayout/AdminLayout.vue";
import DataTable from "@/Pages/components/AdminLayout/DataTable.vue";

export default {
    layout: AdminLayout,
    components: {
        DataTable
    },
    props: {
        columns: [],
        limits: {},
    }
}
</script>
