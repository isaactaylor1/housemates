<template>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="js-wizard-simple block block-rounded js-appear-enabled animated fadeIn">
                    <div class="block-content block-content-full tab-content">
                        <div class="row mb-4">
                            <div class="col-12 my-auto">
                                <span class="h5">Accounts</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table table-hover table-vcenter table-bordered table-striped js-appear-enabled animated fadeIn">
                                        <thead v-if="datatable.data.length">
                                            <tr>
                                                <th>ID</th>
                                                <th>Account Type</th>
                                                <th>Account Holder</th>
                                                <th>Current Balance</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white">
                                            <tr v-for="(account, key) in datatable.data" :key="key">
                                                <td>{{ account.id }}</td>
                                                <td>{{ account.account_type }}</td>
                                                <td>{{ account.account_holder }}</td>
                                                <td>{{ account.current_balance }}</td>
                                                <td class="text-center btn-td">
                                                    <router-link class="btn btn-secondary btn-sm" :to="'/account/' + account.id">
                                                        Account 
                                                    </router-link>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div>
                            <pagination />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Pagination from "./layout/tables/Pagination";
export default {
    data () {
        return {
            datatable: {
                data: {},
                current_page: 1,
                per_page: 10,
                last_page: 0,
                total: 1,
            }
        }
    },
    components: {
        Pagination,
    },
    mounted () {
        if (this.$route.query.page) {
            this.datatable.current_page = this.$route.query.page;
        }
        this.readAccounts(this.datatable.current_page)
    },
    methods: {
        readAccounts(page) {
            var route = "accounts/?";
            route += "page=" + page;
            this.$router
            .push({
                query: {
                    page: page,
                },
            })
            .catch((error) => {

            })
            axios.get(route)
            .then(response => {
                this.datatable = response.data
            })
        },
        changePage(current_page) {
            if (current_page <= this.datatable.last_page && current_page > 0) {
                this.datatable.current_page = current_page;
                this.readAccounts(current_page);
            }
        },
    }
}
</script>