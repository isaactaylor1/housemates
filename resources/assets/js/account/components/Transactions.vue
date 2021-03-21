<template>
    <div>
        <div class="table-responsive">
            <table class="table table-hover table-vcenter table-bordered table-striped js-appear-enabled animated fadeIn">
                <thead v-if="transactions.data.length">
                    <tr>
                        <th>Type</th>
                        <th>Ammount</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr v-for="(transaction, key) in transactions.data" :key="key">
                        <td>{{ transaction.transaction_type | transactionType }}</td>
                        <td>£{{ transaction.transaction_value }}</td>
                        <td>{{ transaction.description }}</td>
                        <td>{{ transaction.created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import Pagination from "./layout/tables/Pagination";
export default {
    computed: {
        transactions: function () {
            return this.$parent.datatable;
        }
    },
}
</script>